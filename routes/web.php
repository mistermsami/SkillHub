<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Student;
use App\Http\Controllers\Freelancer;
use App\Http\Controllers\Buyer;

// Route::get('/', function () {
//     return view('home');
// })->name('home');
Route::get('/', [Home::class, 'home'])->name('home');
Route::get('/signin', function () {
    return view('signin');
})->name('signin');
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/contact', function () {
    return view('contact');
});

// Student Routes

//Display Courses
Route::get('/student', [Student::class, 'studentcourses'])->name('student');

//Course Details
Route::get('/student/coursedetails/{id}', [Student::class, 'coursedetails'])->name('coursedetails');

//Register as student
Route::get('/student/regstartcourse/{id}', [Student::class, 'regstartcourse'])->name('regstartcourse');


//Start Course + Enrollment
Route::get('/student/startcourse/{id}', [Student::class, 'startcourse'])->name('startcourse');
//Course Complete
Route::get('/student/coursecomplete/{id}', [Student::class, 'coursecomplete'])->name('coursecomplete');
//Course Complete
Route::get('/studentdetails', [Student::class, 'studentdetails'])->name('studentdetails');
//Course Complete
Route::get('/profilesetting', [Student::class, 'profilesetting'])->name('profilesetting');
//Course Complete
Route::post('/studentprofileupdate', [Student::class, 'studentprofileupdate'])->name('studentprofileupdate');




// Freelancer Routes
Route::get('/seller', function () {
    return view('seller.sellerdashboard');
})->name('seller.sellerdashboard');
Route::get('/sellerdashboard', function () {
    return view('seller.sellerdashboard');
});

//Create Coures
Route::get('/createcourse', [CourseController::class, 'createcourse'])->name('createcourse');
//Store new Course
Route::post('/storeCourse', [CourseController::class, 'storeCourse'])->name('storeCourse');
//Add Course Lesson
Route::get('/addcourselesson', [CourseController::class, 'addcourselesson'])->name('addcourselesson');
//Store new Lesson
Route::post('/storecourselesson', [CourseController::class, 'storecourselesson'])->name('storecourselesson');
Route::get('/registeredcourses', [CourseController::class, 'registeredcourses'])->name('registeredcourses');

//Create Gig
Route::get('/creategig', [Freelancer::class, 'creategig'])->name('creategig');
//Store new Gig
Route::post('/storeGig', [Freelancer::class, 'storeGig'])->name('storeGig');
//Manage Gig
Route::get('/managegigs', [Freelancer::class, 'managegigs'])->name('managegigs');
//All Freelancer Gigs
Route::get('/freelancersgig', [Freelancer::class, 'freelancersgig'])->name('freelancersgig');
//My Proposals
Route::get('/myproposals', [Freelancer::class, 'myproposals'])->name('myproposals');
//My Orders
Route::get('/sellerorders', [Freelancer::class, 'sellerorders'])->name('sellerorders');
//Mark Order as Complete
Route::post('/ordercompleted/{proposalId}/{jobid}', [Freelancer::class, 'ordercompleted'])->name('ordercompleted');
//Seller Profile Manage
Route::get('/sellerprofilesetting', [Freelancer::class, 'sellerprofilesetting'])->name('sellerprofilesetting');
//Seller Profile Update
Route::post('/sellerprofileupdate', [Freelancer::class, 'sellerprofileupdate'])->name('sellerprofileupdate');
//All Freelancers
Route::get('/freelancers', [Freelancer::class, 'freelancers'])->name('freelancers');
//Freelancer Details
Route::get('/freelancerdetails/{freelancerid}', [Freelancer::class, 'freelancerdetails'])->name('freelancerdetails');
//Freelancer Details
Route::get('/gigdetails/{gigid}', [Freelancer::class, 'gigdetails'])->name('gigdetails');

// Route::get('/sellerorders', function () {
//     return view('seller.orders');
// });
Route::get('/withdrawhistory', function () {
    return view('seller.withdrawhistory');
});
Route::get('/sellermessage', function () {
    return view('seller.sellermessage');
});
// Route::get('/sellerprofilesetting', function () {
//     return view('seller.sellerprofilesetting');
// });
// Route::get('/managegigs', function () {
//     return view('seller.managegigs');
// });
// });


// Buyer Routes
// Route::middleware('account.type:buyer')->group(function () {
Route::get('/buyer', function () {
    return view('buyer.buyerdashboard');
})->name('buyer.buyerdashboard');
Route::get('/buyerdashboard', function () {
    return view('buyer.buyerdashboard');
});
//Create Job
Route::get('/createjob', [Buyer::class, 'createjob'])->name('createjob');
//Store new Job
Route::post('/storeJob', [Buyer::class, 'storeJob'])->name('storeJob');
//Manage Job
Route::get('/managejobs', [Buyer::class, 'managejobs'])->name('managejobs');
//All Freelance Jobs
Route::get('/buyersjobs', [Buyer::class, 'buyersjobs'])->name('buyersjobs');
//Job Details
Route::get('/jobdetails/{jobid}', [Buyer::class, 'jobdetails'])->name('jobdetails');
//Store new Proposal
Route::post('/storeproposal/{jobid}', [Buyer::class, 'storeproposal'])->name('storeproposal');
//Accept Proposal
Route::post('/acceptProposal/{proposalId}/{jobid}', [Buyer::class, 'acceptProposal'])->name('acceptProposal');
//Reject Proposal
Route::post('/declineProposal/{proposalId}', [Buyer::class, 'declineProposal'])->name('declineProposal');
//Order complete request
Route::post('/ordercompleterequest/{proposalId}/{jobid}', [Buyer::class, 'ordercompleterequest'])->name('ordercompleterequest');
//My Orders
Route::get('/myorderslist', [Buyer::class, 'myorderslist'])->name('myorderslist');
//Buyer Profile Setting
Route::get('/buyerprofilesettings', [Buyer::class, 'buyerprofilesettings'])->name('buyerprofilesettings');
//Buyer Profile Update
Route::post('/buyerprofileupdate', [Buyer::class, 'buyerprofileupdate'])->name('buyerprofileupdate');
//Buyer Details
Route::get('/buyerdetails/{buyerid}', [Buyer::class, 'buyerdetails'])->name('buyerdetails');
// Route::get('/createjob', function () {
//     return view('buyer.createjob');
// });
// Route::get('/myjoblist', function () {
//     return view('buyer.myjoblist');
// });
// Route::get('/myorderslist', function () {
    //     return view('buyer.myorderslist');
    // });
    Route::get('/buyermessages', function () {
        return view('buyer.buyermessages');
    });
// Route::get('/buyerprofilesettings', function () {
//     return view('buyer.buyerprofilesettings');
// });
Route::get('/buyerpasschange', function () {
    return view('buyer.buyerpasschange');
});
Route::get('/buyeraccountdelete', function () {
    return view('buyer.buyeraccountdelete');
});
// });

// Signup and Signin Routes
Route::post('signupskillhub', [Home::class, 'signupskillhub'])->name('signupskillhub');
Route::post('signinskillhub', [Home::class, 'signinskillhub'])->name('signinskillhub');
Route::get('/logout', [Home::class, 'logout'])->name('userlogout');
