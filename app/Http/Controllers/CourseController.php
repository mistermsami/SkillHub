<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\Courses;
use App\Models\courseLessons;

class CourseController extends Controller
{
    public function createcourse()
    {
        if (session()->get('freelancerId')) {
            $categories = CourseCategory::all();
            return view('seller.createcourse', compact('categories'));
        } else {
            return view('signin');
        }
    }
    public function storeCourse(Request $request)
    {
        if (session()->get('freelancerId')) {
            // dd($request);
            $validatedData = $request->validate([
                'C_title' => 'required|string|max:255',
                'C_description' => 'required|string|max:1500',
                'C_image' => 'required|image',
                'C_price' => 'required|numeric',
                'CC_id' => 'required|exists:course_categories,CC_id',
            ]);

            $imageFile = $request->C_image;
            $imagePath = time() . '.' . $imageFile->extension();
            $imageFile->move(public_path('course_images'), $imagePath);

            $course = new Courses();
            $course->FS_id = session()->get('freelancerId');
            $course->C_title = $validatedData['C_title'];
            $course->C_description = $validatedData['C_description'];
            $course->C_image = $imagePath;
            $course->C_price = $validatedData['C_price'];
            $course->CC_id = $validatedData['CC_id'];
            // dd($course);

            $courseCreated = $course->save();

            if ($courseCreated) {
                return back()->with('success', 'Course created successfully.');
            } else {
                return back()->with('error', 'something went wrong!');
            }
        } else {
            return view('signin');
        }
    }

    public function addcourselesson()
    {
        if (session()->get('freelancerId')) {
            $course = Courses::where('FS_id', session()->get('freelancerId'))->get();
            return view('seller.addcourselesson', compact('course'));
        } else {
            return view('signin');
        }
    }
    public function storecourselesson(Request $request)
    {
        if (session()->get('freelancerId')) {
            // Validate the request
            $validatedData = $request->validate([
                'Course_id' => 'required',
                'CL_lessonname' => 'required|string|max:255',
                'CL_videopath' => 'required|file|mimes:mp4,mov,ogg,qt|max:204800',
            ]);

            if ($request->hasFile('CL_videopath')) {
            $videoFile = $request->file('CL_videopath');
            $videoPath = time() . '.' . $videoFile->extension();
            $videoFile->move(public_path('course_videos'), $videoPath);
            }

            $courselesson = new courseLessons();
            $courselesson->C_id = $validatedData['Course_id'];
            $courselesson->CL_lessonname = $validatedData['CL_lessonname'];
            $courselesson->CL_videopath = $videoPath;

            // if ($request->hasFile('newlessonvideo')) {
            //     // Get the video file
            //     // ini_set('memory_limit', '5048M');
            //     $videoFile = $request->file('newlessonvideo');

            //     // Get the video content as binary data
            //     $videoContent = file_get_contents($videoFile->getRealPath());

            //     // Update the `newvideo` column with the binary data
            //     $courselesson->CL_newvideo = $videoContent;
            // }

            $lessonstored = $courselesson->save();
            if ($lessonstored) {
                return back()->with('success', 'Lesson added successfully.');
            } else {
                return back()->with('error', 'Something went wrong!');
            }
        } else {
            return view('signin');
        }
    }
    public function registeredcourses(){
        if (session()->get('freelancerId')) {
            $courses = Courses::where('FS_id', session()->get('freelancerId'))->get();
            // $courses = courseLessons::where('FS_id', session()->get('freelancer'))->get();
            return view('seller.registeredcourses', compact('courses'));
        }
    }
}
