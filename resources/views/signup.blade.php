@extends('layout.layout')

{{-- PageTitle --}}
@section('pagetitle')
    Signup
@endsection


{{-- Main Content --}}
@section('maincontent')
    <!-- Main Start -->
    <main>
        <!-- Breadcrumb -->
        <section class="w-breadcrumb-area"
            style="
          background: url('assets/img/common/breadcrumb-bg.png') no-repeat
            center center/cover;
        ">
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="position-relative z-2" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="linear">
                            <h2 class="section-title-light mb-2">Sign Up</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb w-breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Signup
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb End -->
        <style>
            input[type=radio]:checked {
                background-color: #22be0d;
                border: #22be0d
            }
        </style>
        <!-- Login Form -->
        <section class="py-110 bg-offWhite">
            <div class="container">
                {{-- <div class="mb-5">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <div class="d-flex align-items-center gap-3">
                                <a href="" class="w-form-btn">Freelancer</a>
                                <a href="" class="w-form-btn-outline">Buyer</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="bg-white rounded-3 p-3">
                    <div class="row g-4">
                        <div class="col-lg-6 p-3 p-lg-5">
                            <div class="mb-40">
                                <h2 class="section-title mb-2">Sign up</h2>
                                <p class="section-desc">Welcome to Skill Hub</p>
                            </div>
                            <form action="{{ route('signupskillhub') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-container">
                                    <div class="row gy-3">
                                        <div class="form-input col-lg-12">
                                            <label for="username" class="form-label">Username
                                                <span class="text-lime-300">*</span></label>
                                            <input type="text" id="username" name="username" placeholder="username"
                                                class="form-control shadow-none" required />
                                        </div>
                                        <div class="form-input col-lg-6">
                                            <label for="fname" class="form-label">First Name
                                                <span class="text-lime-300">*</span></label>
                                            <input type="text" id="fname" name="firstname" placeholder="First Name"
                                                class="form-control shadow-none" required />
                                        </div>
                                        <div class="form-input col-lg-6">
                                            <label for="lname" class="form-label">Last Name <span
                                                    class="text-lime-300">*</span></label>
                                            <input type="text" id="lname" name="lastname" placeholder="Last Name"
                                                class="form-control shadow-none" required />
                                        </div>
                                        <div class="form-input col-lg-6">
                                            <label for="phone" class="form-label">Phone <span
                                                    class="text-lime-300">*</span></label>
                                            <input type="tel" id="phone" name="phone" placeholder="01403817190"
                                                class="form-control shadow-none" required />
                                        </div>
                                        <div class="form-input col-lg-6">
                                            <label for="phone" class="form-label">Email <span
                                                    class="text-lime-300">*</span></label>
                                            <input type="text" id="email" name="email" placeholder="demo@email.com"
                                                class="form-control shadow-none" />
                                        </div>
                                        <div class="form-input col-lg-6">
                                            <label for="country" class="form-label">Country <span
                                                    class="text-lime-300">*</span></label>
                                            <input type="text" id="country" name="country" placeholder="Country"
                                                class="form-control shadow-none" required />
                                            {{-- <select class="form-select shadow-none" name="country" id="country">
                                                <option value="1">Select Country</option>
                                                <option value="2">Germany</option>
                                                <option value="3">China</option>
                                            </select> --}}
                                        </div>
                                        <div class="form-input col-lg-6">
                                            <label for="city" class="form-label">City <span
                                                    class="text-lime-300">*</span></label>
                                            <input type="text" id="city" name="city" placeholder="City"
                                                class="form-control shadow-none" required />
                                            {{-- <select class="form-select shadow-none" name="country" id="country">
                                                <option value="1">Select City</option>
                                                <option value="2">Berlin</option>
                                                <option value="3">Beijing</option>
                                            </select> --}}
                                        </div>
                                        {{-- <div class="form-input col-lg-12">
                                            <label for="password" class="form-label">Address <span
                                                    class="text-lime-300">*</span></label>
                                            <input type="text" id="password" placeholder="Address here"
                                                class="form-control shadow-none" />
                                        </div> --}}
                                        <div class="form-input col-lg-12">
                                            <label for="image" class="form-label">Profile Image <span
                                                    class="text-lime-300">*</span></label>
                                            <input type="file" id="image" name="profileimage" placeholder="Image"
                                                class="form-control shadow-none" required />
                                        </div>
                                        <div class="form-input col-lg-12">
                                            <label for="acctype" class="form-label">Account Type<span
                                                    class="text-lime-300">*</span></label>
                                            <div class="row">
                                                <div class="col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="buyer"
                                                        name="accounttype" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Buyer
                                                    </label>
                                                </div>
                                                <div class="col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="freelancer"
                                                        name="accounttype" id="flexRadioDefault2" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Freelancer
                                                    </label>
                                                </div>
                                                <div class="col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="student"
                                                        name="accounttype" id="flexRadioDefault2" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Student
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-input col-lg-12">
                                            <label for="password" class="form-label">Password <span
                                                    class="text-lime-300">*</span></label>
                                            <input type="text" id="password" name="password" placeholder="********"
                                                class="form-control shadow-none" required />
                                        </div>
                                    </div>
                                    <!-- Display Success Message -->
                                    @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif

                                    <!-- Display Error Message -->
                                    @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="d-grid mt-4">
                                        <button class="w-btn-secondary-lg" type="submit">Create Account</button>
                                    </div>
                                </div>
                            </form>
                            <div class="mt-3">
                                <p class="text-center form-text">
                                    Already have an account ? <a href="{{ asset('signin') }}"> Login </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="login-img">
                                <img src="assets/img/others/1.png" class="img-fluid w-100" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login Form End -->
    </main>
    <!-- Maine End -->
@endsection
