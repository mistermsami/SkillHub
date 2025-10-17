<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CourseCategory;
use App\Models\Courses;
use App\Models\courseLessons;
use App\Models\freelanceSeller;
use App\Models\freelanceBuyer;
use App\Models\eLearning;
use App\Models\courseEnrollments;
use Illuminate\Support\Facades\Session;

class Student extends Controller
{
    public function studentcourses()
    {
        $courses = Courses::with('author', 'author.user')->get();

        return view('elearning.courses', compact('courses'));
    }

    public function coursedetails($courseid)
    {
        $course = Courses::with('author', 'author.user')->where('C_id', $courseid)->first();
        $totallessons = courseLessons::where('C_id', $courseid)->get();
        $countlessons = $totallessons->count();

        $morecourses = Courses::with('author', 'author.user', 'category')->take(3)->get();

        $courseenrolled = courseEnrollments::where('EL_id', session()->get('studentId'))->where('C_id', $courseid)->first();
        // dd($courseenrolled);
        return view('elearning.coursedetails', compact('course', 'morecourses', 'totallessons', 'countlessons', 'courseenrolled'));
    }
    public function regstartcourse($courseid)
    {
        if (session()->has('studentId') || (session()->has('freelancerId') || (session()->has('buyerId') && session()->has('GU_id')))) {
            $alreadyexist = eLearning::where('GU_id', session()->get('GU_id'));
            if ($alreadyexist->count() > 0) {
                Session::flush();
                return redirect('signin')->with('error', 'Please signin again session expired!');
            } else {
                $newstudent = new eLearning();
                $newstudent->GU_id = session()->get('GU_id');
                $newstudentregistered = $newstudent->save();

                if ($newstudentregistered) {
                    session()->put('studentId', $newstudent->EL_id);
                    return $this->startcourse($courseid);
                } else {
                    return back()->with('error', 'Failed to register. Try later or signin again');
                }
            }
        } else {
            return back()->with('error', 'User not authenticated or missing required session data. Try later or signin again');
        }
    }

    public function startcourse($courseid)
    {
        if (session()->has('studentId')) {
            $alreadyenrolled = courseEnrollments::where('EL_id', session()->get('studentId'))->where('C_id', $courseid)->first();

            if ($alreadyenrolled) {
                if ($alreadyenrolled->EL_status === 'completed') {
                    return back()->with('error', 'You have already completed this course');
                }

                $course = Courses::with('author', 'author.user')->where('C_id', $courseid)->first();
                $courselessons = courseLessons::where('C_id', $courseid)->get();
                $morecourses = Courses::with('author', 'author.user', 'category')->take(3)->get();

                return view('elearning.coursestart', compact('course', 'courselessons', 'morecourses'));
            } else {
                $enrolcourse = new courseEnrollments();
                $enrolcourse->EL_id = session()->get('studentId');
                $enrolcourse->C_id = $courseid;
                $enrolcourse->CE_status = 'inprogress';
                $studentenrolled = $enrolcourse->save();

                if ($studentenrolled) {
                    $course = Courses::with('author', 'author.user')->where('C_id', $courseid)->first();
                    $courselessons = courseLessons::where('C_id', $courseid)->get();
                    $morecourses = Courses::with('author', 'author.user', 'category')->take(3)->get();

                    return view('elearning.coursestart', compact('course', 'courselessons', 'morecourses'));
                } else {
                    return back()->with('error', 'Something went wrong while enrolling in the course.');
                }
            }
        } else {
            return redirect()->route('signin');
        }
    }
    public function coursecomplete($courseid)
    {
        $courseEnrollment = courseEnrollments::where('EL_id', session()->get('studentId'))->where('C_id', $courseid)->first();

        if ($courseEnrollment) {
            $courseEnrollment->CE_status = 'completed';
            $courseEnrollment->save();

            return redirect('student')->with('success', 'Course marked as completed!');
        } else {
            return back()->with('error', 'Course enrollment not found!');
        }
    }
    public function studentdetails(){
        $student = eLearning::with('user')->where('EL_id', session()->get('studentId'))->first();
        $enrolledcourses = courseEnrollments::with('courses')->where('EL_id', session()->get('studentId'))->where('CE_status', 'inprogress')->get();
        $completedcourses = courseEnrollments::with('courses', 'courses.author', 'courses.author.user')->where('EL_id', session()->get('studentId'))->where('CE_status', 'completed')->get();
        // dd(session()->get('studentId'));

        return view('elearning.studentdetails', compact('student', 'enrolledcourses', 'completedcourses'));
    }
    public function profilesetting(){
        $student = eLearning::with('user')->where('EL_id', session()->get('studentId'))->first();
        return view('elearning.studentprofilesetting', compact('student'));
    }
    public function studentprofileupdate(Request $request){
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'gender' => 'required',
            'profileimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get the freelancer's details
        $buyer = eLearning::where('EL_id', session()->get('studentId'))->first();

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


        // Redirect back with a success message
        return back()->with('success', 'Profile updated successfully.');
    }

}
