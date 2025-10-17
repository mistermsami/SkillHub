<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\freelanceCategory;
use App\Models\Gigss;
use App\Models\Freelance;
use App\Models\freelanceBuyer;
use App\Models\Job;
use App\Models\Proposal;
use App\Models\freelanceSeller;

class Buyer extends Controller
{
    public function createjob()
    {
        if (session()->has('buyerId')) {
            return view('buyer.createjob');
        } else {
            return view('signin');
        }
    }

    public function storeJob(Request $request)
    {
        $request->validate([
            'J_title' => 'required|string|max:255',
            'J_description' => 'required|string|max:1500',
            'J_budget' => 'required|numeric',
        ]);

        $job = new Job();
        $job->FB_id = session()->get('buyerId');
        $job->J_title = $request->J_title;
        $job->J_description = $request->J_description;
        $job->J_budget = $request->J_budget;
        $job->J_status = 'open';
        $job->save();

        return back()->with('success', 'Job posted successfully.');
    }

    // public function managejobs()
    // {
    //     if (session()->has('buyerId')) {
    //         $jobs = Job::where('FB_id', session()->get('buyerId'))->get();

    //         foreach($jobs as $job){
    //             $proposaljobscount = Proposal::where('J_id', $job->J_id)->count();
    //         }
    //         $openjobscount = Job::where('FB_id', session()->get('buyerId'))->where('J_status', 'open')->count();

    //         $jobproposals = Job::with([
    //             'proposals.gig.freelanceSeller.user',
    //             'freelanceBuyer'
    //         ])
    //         ->where('FB_id', session()->get('buyerId'))
    //         ->get();
    //         // dd($proposals);

    //         return view('buyer.myjoblist', compact('jobs', 'openjobscount', 'proposaljobscount', 'jobproposals'));
    //     } else {
    //         return view('signin');
    //     }
    // }
    public function managejobs()
    {
        if (session()->has('buyerId')) {
            $jobs = Job::where('FB_id', session()->get('buyerId'))->with('proposals.gig.freelanceSeller.user', 'freelanceBuyer')->where('J_status', 'open')->get();

            $openjobscount = $jobs->count();

            // Create an array to hold the count of proposals for each job
            $proposaljobscount = [];
            if ($openjobscount > 0) {
                foreach ($jobs as $job) {
                    // Count proposals for each job
                    $proposaljobscount[$job->J_id] = Proposal::where('J_id', $job->J_id)->count();
                }
            } else {
                $proposaljobscount = 0;
            }

            // $openjobscount = Job::where('FB_id', session()->get('buyerId'))->where('J_status', 'open')->count();
            // if($openjobscount > 0){
            //     foreach ($jobs as $job) {
            //         $proposaljobscount = Proposal::where('J_id', $job->J_id)->count();
            //     }
            // }
            // else{
            //     $proposaljobscount = 0;
            // }
            return view('buyer.myjoblist', compact('jobs', 'openjobscount', 'proposaljobscount'));
        } else {
            return view('signin');
        }
    }

    public function acceptProposal($proposalId, $jobid)
    {
        $proposal = Proposal::findOrFail($proposalId);
        $proposal->P_status = 'accepted';
        $proposal->save();

        $job = Job::findOrFail($jobid);
        $job->J_status = 'inprogress';
        $job->save();

        // Mark all other proposals for the job as declined
        Proposal::where('G_id', $proposal->G_id)
            ->where('P_id', '!=', $proposalId)
            ->update(['P_status' => 'declined']);

        return back()->with('success', 'Proposal accepted.');
    }

    public function declineProposal($proposalId)
    {
        // dd($proposalId);
        $proposal = Proposal::findOrFail($proposalId);
        $proposal->P_status = 'declined';
        $proposal->save();

        return back()->with('success', 'Proposal declined.');
    }
    public function ordercompleterequest(Request $request,$proposalId, $jobid)
    {
        $proposal = Proposal::findOrFail($proposalId);
        // $addingrating = freelanceSeller::with('gigs')
        // ->where('G_id', $proposal->G_id)->get();
        $proposal->P_status = 'completed';
        $proposal->rating = $request->input('rating'); // Save the rating

        $proposal->save();

        $job = Job::findOrFail($jobid);
        $job->J_status = 'completed';
        $job->save();

        return back()->with('success', 'Order is marked as completed.');
    }

    public function myorderslist()
    {
        if (session()->has('buyerId')) {
            $jobs = Job::where('FB_id', session()->get('buyerId'))->with('proposals.gig.freelanceSeller.user', 'freelanceBuyer')->whereNot('J_status', 'open')->get();

            $openjobscount = Job::where('FB_id', session()->get('buyerId'))->whereNot('J_status', 'open')->count();
            if ($openjobscount > 0) {
                foreach ($jobs as $job) {
                    $proposaljobscount = Proposal::where('J_id', $job->J_id)->count();
                }
            } else {
                $proposaljobscount = 0;
            }
            return view('buyer.myorderslist', compact('jobs', 'openjobscount', 'proposaljobscount'));
        } else {
            return view('signin');
        }
    }

    public function buyersjobs()
    {
        $jobs = Job::with('freelanceBuyer', 'freelanceBuyer.user')->where('J_status', 'open')->get();

        return view('buyer.freelancejobs', compact('jobs'));
    }
    public function jobdetails($jobid)
    {
        $jobdetail = Job::with('freelanceBuyer', 'freelanceBuyer.user')->where('J_status', 'open')->where('J_id', $jobid)->first();
        if (session()->has('freelancerId')) {
            $gigs = Gigss::where('FS_id', session()->get('freelancerId'))->get();
            // dd($gigs);
            return view('buyer.jobdetails', compact('jobdetail', 'gigs'));
        }
        return view('buyer.jobdetails', compact('jobdetail'));
    }

    public function storeproposal($jobid, Request $request)
    {
        $request->validate([
            'G_id' => 'required|int|max:255',
            'P_coverletter' => 'required|string|max:1500',
        ]);

        $saveproposal = new Proposal();
        $saveproposal->J_id = $jobid;
        $saveproposal->G_id = $request->G_id;
        $saveproposal->P_coverletter = $request->P_coverletter;
        $saveproposal->P_status = 'open';
        $proposalsaved = $saveproposal->save();
        if ($proposalsaved) {
            return back()->with('success', 'Proposal submitted successfully.');
        } else {
            return back()->with('error', 'Failed to submit proposal.');
        }
    }
    public function buyerprofilesettings(){
        $buyerdetails = freelanceBuyer::with('user')->where('FB_id', session()->get('buyerId'))->first();
        return view('buyer.buyerprofilesettings', compact('buyerdetails'));
    }
    public function buyerprofileupdate(Request $request){
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'description' => 'required|string',
            'gender' => 'required',
            'profileimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get the freelancer's details
        $buyer = freelanceBuyer::where('FB_id', session()->get('buyerId'))->first();

        // Update the User model
        $user = $buyer->user;
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
            $imageName = time() . '.' . $request->profileimage->extension();
            $request->profileimage->move(public_path('profile_images'), $imageName);
            $user->profileimage = $imageName;
        }

        // Save the updated user data
        $user->save();

        // Update the freelanceSeller model
        $buyer->FB_about = $request->input('description');

        // Save the updated freelancer data
        $buyer->save();

        // Redirect back with a success message
        return back()->with('success', 'Profile updated successfully.');
    }
    public function buyerdetails($buyerid){
        $buyerdetails = freelanceBuyer::with('user')->where('FB_id', $buyerid)->first();
        return view('buyer.buyerdetails', compact('buyerdetails'));
    }
}
