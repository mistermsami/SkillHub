@extends('layout.layout')

{{-- PageTitle --}}
@section('pagetitle')
    Profile Settings
@endsection

<style>
    .nav-link{
        color: #000 !important;
    }
</style>
{{-- Main Content --}}
@section('maincontent')
    <div class="d-xl-flex bg-offWhite">

        <!-- Right -->
        <div class="flex-grow-1 align-items-center">

            <!-- Main -->
            <main class="container min-vh-100" style="margin-top: 120px">
                <div class="d-flex flex-column gap-4">
                    <!-- Header -->
                    <div>
                        <h3 class="text-24 fw-bold text-dark-300 mb-2">
                            Profile Settings
                        </h3>
                        <ul class="d-flex align-items-center gap-2">
                            <li class="text-dark-200 fs-6">Dashboard</li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="5" height="11" viewBox="0 0 5 11"
                                    fill="none">
                                    <path d="M1 10L4 5.5L1 1" stroke="#5B5B5B" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </li>
                            <li class="text-lime-300 fs-6">Profile Settings</li>
                        </ul>
                    </div>

                    <!-- Content -->
                    <div>
                        <div class="row justify-content-center py-5">
                            <div class="col-xl-10">
                                <!-- Display Success Message -->
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <!-- Display Error Message -->
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show my-2">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('studentprofileupdate') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex flex-column gap-4">
                                        <!-- Profile Info -->
                                        <div class="profile-info-card">
                                            <!-- Header -->
                                            <div class="profile-info-header">
                                                <h4 class="text-18 fw-semibold text-dark-300">
                                                    Profile Info
                                                </h4>
                                            </div>
                                            <div class="profile-info-body bg-white">
                                                <div class="row g-4">
                                                    <div class="col-md-6">
                                                        <div class="form-container">
                                                            <label for="fname" class="form-label">First Name
                                                                <span class="text-lime-300">*</span>
                                                            </label>
                                                            <input type="text" class="form-control shadow-none"
                                                                placeholder="Mansa" name="firstname"
                                                                value="{{ $student->user->firstname }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-container">
                                                            <label for="lname" class="form-label">Last Name
                                                                <span class="text-lime-300">*</span></label>
                                                            <input type="text" class="form-control shadow-none"
                                                                placeholder="Musa" name="lastname"
                                                                value="{{ $student->user->lastname }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-container">
                                                            <label for="lname" class="form-label">Username
                                                                <span class="text-lime-300">*</span></label>
                                                            <input type="text" class="form-control shadow-none"
                                                                placeholder="Musa" name="username"
                                                                value="{{ $student->user->username }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-container">
                                                            <label for="email" class="form-label">
                                                                Email Address
                                                                <span class="text-lime-300">*</span></label>
                                                            <input type="text" class="form-control shadow-none"
                                                                placeholder="example@email.com" name="email"
                                                                value="{{ $student->user->email }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-container">
                                                            <label for="category" class="form-label">Country
                                                                <span class="text-lime-300">*</span></label>
                                                            <input type="text" class="form-control shadow-none"
                                                                name="country" id=""
                                                                value="{{ $student->user->country }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-container">
                                                            <label for="category" class="form-label">Town/City
                                                                <span class="text-lime-300">*</span></label>
                                                            <input type="text" class="form-control shadow-none"
                                                                name="city" id=""
                                                                value="{{ $student->user->city }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-container">
                                                            <label for="gender" class="form-label">Gender
                                                                <span class="text-lime-300">*</span></label>
                                                            <select id="gender" name="gender" autocomplete="off"
                                                                class="form-select shadow-none">
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-container">
                                                            <label for="language" class="form-label">
                                                                Language</label>
                                                            <input id="language" type="text"
                                                                class="form-control shadow-none"
                                                                placeholder="example@email.com" name="language"
                                                                value="{{ $student->user->language }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Profile Image -->
                                        <div class="profile-info-card">
                                            <!-- Header -->
                                            <div class="profile-info-header">
                                                <h4 class="text-18 fw-semibold text-dark-300">
                                                    Profile Image
                                                </h4>
                                            </div>
                                            <div class="profile-info-body bg-white">
                                                @if ($student->user->profileimage)
                                                    <div class="mt-2 mb-2">
                                                        <img src="{{ asset('profile_images/' . $student->user->profileimage) }}"
                                                            style="height: 100px; width: 100px;" alt="">
                                                    </div>
                                                @endif
                                                <div class="row g-4">
                                                    <div class="col-12">
                                                        <div class="form-container">
                                                            <input type="file" id="image" name="profileimage"
                                                                placeholder="Image" class="form-control shadow-none" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Submit Btn -->
                                        <div class="d-flex align-items-center gap-4">
                                            <button class="w-btn-secondary-lg" type="submit">
                                                Save Now
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10"
                                                    viewBox="0 0 14 10" fill="none">
                                                    <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="white"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            {{-- <button class="text-danger text-decoration-underline">
                                                Cancel
                                            </button> --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
