<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\eLearning;
use App\Models\freelanceSeller;
use App\Models\freelanceBuyer;
use App\Models\Gigss;
use App\Models\Job;
use App\Models\freelanceCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class Home extends Controller
{
    public function home()
    {
        $gigs = Gigss::with('freelanceSeller', 'freelanceSeller.user', 'freelancecategory')->limit(8)->get();
        $jobs = Job::with('freelanceBuyer', 'freelanceBuyer.user')->where('J_status', 'open')->limit(9)->get();
        $gigCategory = freelanceCategory::get();
        $freelancers = freelanceSeller::with('user')->get();

        return view('home', compact('gigs', 'jobs', 'gigCategory', 'freelancers'));
    }
    public function signupskillhub(Request $signupdata)
    {
        // Validate the incoming request data
        $validator = Validator::make($signupdata->all(), [
            'username' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'profileimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|string|min:6',
            'accounttype' => 'required|string|in:buyer,freelancer,student',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if the email already exists
        $existingUser = User::where('email', $signupdata->email)->first();
        if ($existingUser) {
            return redirect()->back()->with('error', 'User already exists with this email.');
        }

        // Handle the image file upload
        if ($signupdata->hasFile('profileimage')) {
            $imageFile = $signupdata->file('profileimage');

            $imageContent = file_get_contents($imageFile->getRealPath());

            $profileImageName = time() . '.' . $imageFile->extension();

            // Move the uploaded image to a public directory
            $imageFile->move(public_path('profile_images'), $profileImageName);
        } else {
            return redirect()->back()->with('error', 'Image upload failed.');
        }

        // Create a new user
        $user = new User();
        $user->username = $signupdata->username;
        $user->firstname = $signupdata->firstname;
        $user->lastname = $signupdata->lastname;
        $user->phone = $signupdata->phone;
        $user->email = $signupdata->email;
        $user->country = $signupdata->country;
        $user->city = $signupdata->city;
        $user->profileimage = $profileImageName; // Save the image filename
        $user->password = Hash::make($signupdata->password);

        // If you want to store the binary content in 'newimage'

        $user->newimage = $imageContent; // Store the binary data

        // Save the user to the database
        $isUserSaved = $user->save();

        if ($isUserSaved) {
            // Fetch the GU_id explicitly
            $user->GU_id = $user->getKey();

            // Handle the logic based on account type
            if ($signupdata->accounttype == 'student') {
                DB::table('eLearnings')->insert([
                    'GU_id' => $user->GU_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } elseif ($signupdata->accounttype == 'freelancer') {
                DB::table('freelanceSellers')->insert([
                    'GU_id' => $user->GU_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } elseif ($signupdata->accounttype == 'buyer') {
                DB::table('freelance_buyers')->insert([
                    'GU_id' => $user->GU_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                // If account type is invalid, delete the saved user
                $user->delete();
                return redirect()->back()->with('error', 'Invalid account type');
            }

            // Redirect or return a response
            return redirect()->route('signin')->with('success', 'Account created successfully.');
        } else {
            // Handle the error if the user was not saved
            return redirect()->back()->with('error', 'Failed to create account.');
        }
    }

    public function signinskillhub(Request $signindata)
    {
        $skilhubUser = User::where('email', $signindata->input('email'))->first();

        if (!$skilhubUser || !Hash::check($signindata->input('password'), $skilhubUser->password)) {
            return back()->with('error', 'Invalid Credentials!');
        }

        // Store user information in session
        session()->put('GU_id', $skilhubUser->GU_id);
        session()->put('firstname', $skilhubUser->firstname);
        session()->put('lastname', $skilhubUser->lastname);
        session()->put('username', $skilhubUser->username);
        session()->put('email', $skilhubUser->email);
        session()->put('phone', $skilhubUser->phone);
        session()->put('country', $skilhubUser->country);
        session()->put('city', $skilhubUser->city);
        session()->put('profileimage', $skilhubUser->profileimage);

        // Handle "Remember Me" functionality
        if ($signindata->has('remember')) {
            $minutes = 60 * 24 * 30; // 30 days
            Cookie::queue('user_email', $signindata->email, $minutes);
            Cookie::queue('user_password', $signindata->password, $minutes);
        }

        // Check account types and store IDs in session
        if ($studentAcc = eLearning::where('GU_id', $skilhubUser->GU_id)->first()) {
            session()->put('studentId', $studentAcc->EL_id);
        }

        if ($freelancerAcc = freelanceSeller::where('GU_id', $skilhubUser->GU_id)->first()) {
            session()->put('freelancerId', $freelancerAcc->FS_id);
        }

        if ($buyerAcc = freelanceBuyer::where('GU_id', $skilhubUser->GU_id)->first()) {
            session()->put('buyerId', $buyerAcc->FB_id);
        }
        return redirect('/')->with('success', 'Logged in successfully.');
    }
    public function logout()
    {
        // session()->forget('GU_id');
        // session()->forget('username');
        // session()->forget('firstname');
        // session()->forget('lastname');
        // session()->forget('email');
        // session()->forget('phone');
        // session()->forget('country');
        // session()->forget('city');
        // session()->forget('profileimage');

        // if (session()->has('buyerId')) {
        //     session()->forget('buyerId');
        // }
        // if (session()->has('freelancerId')) {
        //     session()->forget('freelancerId');
        // }
        // if (session()->has('studentId')) {
        //     session()->forget('studentId');
        // }
        Session::flush();
        return redirect('signin');
    }
}
