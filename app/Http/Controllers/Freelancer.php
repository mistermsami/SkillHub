<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\freelanceCategory;
use App\Models\Gigss;
use App\Models\Proposal;
use App\Models\freelanceSeller;
use App\Models\Job;
use App\Models\User;

class Freelancer extends Controller
{
    public function freelancers()
    {
        $freelancers = freelanceSeller::with('user')->get();
        return view('seller.freelancers', compact('freelancers'));
    }
    public function freelancerdetails($freelancerid)
    {
        $freelancerdetials = freelanceSeller::with('user', 'gigs', 'gigs.proposals')->where('FS_id', $freelancerid)->first();
        $skillsArray = explode(',', $freelancerdetials->FS_skills);

        $gigs = Gigss::where('FS_id', $freelancerid)->get();
        return view('seller.freelancerdetails', compact('freelancerdetials', 'skillsArray', 'gigs'));
    }
    public function gigdetails($gigid)
    {
        $gig = Gigss::with('freelanceSeller', 'freelanceSeller.user')->where('G_id', $gigid)->first();
        // dd($gig);
        return view('seller.gigdetails', compact('gig'));
    }
    public function sellerprofilesetting()
    {
        $freelanferdetails = freelanceSeller::with('user')->where('FS_id', session()->get('freelancerId'))->first();
        // Split skills by comma into an array
        $skillsArray = explode(',', $freelanferdetails->FS_skills);
        if ($freelanferdetails->user->newimage) {
            // Encode the binary image data to base64
            $freelanferdetails->user->image_base64 = 'data:image/jpeg;base64,' . base64_encode($freelanferdetails->user->newimage);
        } else {
            $freelanferdetails->user->image_base64 = null; // Or set a default image path if needed
        }
        return view('seller.sellerprofilesetting', compact('freelanferdetails', 'skillsArray'));
    }

    public function sellerprofileupdate(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'description' => 'required|string',
            'designation' => 'required|string|max:255',
            'rate' => 'required|numeric',
            'skills' => 'required|string',
            'gender' => 'required',
            'profileimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get the freelancer's details
        $freelancer = freelanceSeller::where('FS_id', session()->get('freelancerId'))->first();

        // Update the User model
        $user = $freelancer->user;
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->language = $request->input('language');
        $user->gender = $request->input('gender');

        // Handle the profile image upload if a new image is uploaded
        if ($request->hasFile('profileimage')) {
            $imageFile = $request->file('profileimage');

            // Get the image content as binary data
            $imageContent = file_get_contents($imageFile->getRealPath());

            // Update the `newimage` column with the binary data
            $user->newimage = $imageContent;

            $imageName = time() . '.' . $request->profileimage->extension();
            $request->profileimage->move(public_path('profile_images'), $imageName);
            $user->profileimage = $imageName;
        }

        // Save the updated user data
        $user->save();

        // Update the freelanceSeller model
        $freelancer->FS_about = $request->input('description');
        $freelancer->FS_role = $request->input('designation');
        $freelancer->FS_hourlyrate = $request->input('rate');
        $freelancer->FS_skills = $request->input('skills');

        // Save the updated freelancer data
        $freelancer->save();

        // Redirect back with a success message
        return back()->with('success', 'Profile updated successfully.');
    }
    public function creategig()
    {
        if (session()->get('freelancerId')) {
            $categories = freelanceCategory::all();
            return view('seller.creategig', compact('categories'));
        } else {
            return view('signin');
        }
    }

    public function storeGig(Request $request)
    {
        $request->validate([
            'G_title' => 'required|string|max:255',
            'G_description' => 'required|string|max:1500',
            'G_price' => 'required|numeric',
            'G_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gigImage = $request->file('G_image');
        $gigImageName = time() . '.' . $gigImage->extension();
        $gigImage->move(public_path('gig_images'), $gigImageName);

        $gig = new Gigss();
        $gig->FS_id = session()->get('freelancerId');
        $gig->FCat_id = $request->FCat_id;
        $gig->G_title = $request->G_title;
        $gig->G_description = $request->G_description;
        $gig->G_price = $request->G_price;
        $gig->G_image = $gigImageName;
        $gigcreater = $gig->save();

        if ($gigcreater) {
            return back()->with('success', 'Gig created successfully.');
        } else {
            return back()->with('errors', 'Gig createation failed.');
        }
    }

    public function managegigs()
    {
        if (session()->get('freelancerId')) {
            $gigs = Gigss::with('freelanceSeller', 'freelanceSeller.user')->where('FS_id', session()->get('freelancerId'))->get();
            return view('seller.managegigs', compact('gigs'));
        } else {
            return view('signin');
        }
    }
    public function freelancersgig()
    {
        $gigs = Gigss::with('freelanceSeller', 'freelanceSeller.user')->get();
        return view('seller.freelancersgig', compact('gigs'));
    }

    public function myproposals()
    {
        if (session()->get('freelancerId')) {
            // $proposals = Gigss::with('FreelanceSeller', 'proposals', 'proposals.job', 'proposals.job.freelanceBuyer')
            // ->where('FS_id', session()->get('freelancerId'))
            // ->whereHas('proposals', function ($query) {
            //     $query->whereColumn('G_id', 'gigs.G_id');
            // })
            // ->get();
            $proposals = Proposal::with('gig', 'job', 'gig.freelanceSeller', 'job.freelanceBuyer')
                ->whereHas('gig', function ($query) {
                    $query->where('FS_id', session()->get('freelancerId'));
                })
                ->get();
            $allproposals = Proposal::with('gig')
                ->whereHas('gig', function ($query) {
                    $query->where('FS_id', session()->get('freelancerId'));
                })
                ->count();
            $openproposals = Proposal::with('gig')
                ->where('P_status', 'open')
                ->whereHas('gig', function ($query) {
                    $query->where('FS_id', session()->get('freelancerId'));
                })
                ->count();
            $declineproposals = Proposal::with('gig')
                ->where('P_status', 'declined')
                ->whereHas('gig', function ($query) {
                    $query->where('FS_id', session()->get('freelancerId'));
                })
                ->count();

            // dd($proposals);
            return view('seller.myproposals', compact('proposals', 'allproposals', 'openproposals', 'declineproposals'));
        } else {
            return view('signin');
        }
    }

    public function sellerorders()
    {
        if (session()->get('freelancerId')) {
            // $proposals = Gigss::with('FreelanceSeller', 'proposals', 'proposals.job', 'proposals.job.freelanceBuyer')
            // ->where('FS_id', session()->get('freelancerId'))
            // ->whereHas('proposals', function ($query) {
            //     $query->whereColumn('G_id', 'gigs.G_id');
            // })
            // ->get();
            $proposals = Proposal::with('gig', 'job', 'gig.freelanceSeller', 'job.freelanceBuyer')
                ->whereNot('P_status', 'declined')
                ->whereHas('gig', function ($query) {
                    $query->where('FS_id', session()->get('freelancerId'));
                })
                ->get();
            $allproposals = Proposal::with('gig')
                ->whereNot('P_status', 'declined')
                ->whereHas('gig', function ($query) {
                    $query->where('FS_id', session()->get('freelancerId'));
                })
                ->count();
            $openproposals = Proposal::with('gig')
                ->where('P_status', 'accepted')
                ->whereHas('gig', function ($query) {
                    $query->where('FS_id', session()->get('freelancerId'));
                })
                ->count();
            $declineproposals = Proposal::with('gig')
                ->where('P_status', 'declined')
                ->whereHas('gig', function ($query) {
                    $query->where('FS_id', session()->get('freelancerId'));
                })
                ->count();

            // dd($proposals);
            return view('seller.orders', compact('proposals', 'allproposals', 'openproposals', 'declineproposals'));
        } else {
            return view('signin');
        }
    }

    public function ordercompleted(Request $request,$proposalId, $jobid)
    {
        $proposal = Proposal::findOrFail($proposalId);
        $proposal->P_status = 'queue';
        // Handle file upload
        //    dd($request->file('worksubmit'));
        if ($request->hasFile('worksubmit')) {
            $file = $request->file('worksubmit');
            // dd($file);
            $filename = time() . '_' . $file->getClientOriginalName();

            // Move the file to the main public directory
            $file->move(public_path('worksubmit'), $filename);

            // Store the file path in the 'worksubmit' field (or as required)
            $proposal->worksubmit = $filename;
        }
        $proposal->save();

        $job = Job::findOrFail($jobid);
        $job->J_status = 'queue';
        $job->save();

        return back()->with('success', 'Complete request send.');
    }
}
