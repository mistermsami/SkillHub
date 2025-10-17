@extends('seller.layout.sellerlayout')

{{-- PageTitle --}}
@section('pagetitle')
    Create Course
@endsection


{{-- Main Content --}}
@section('maincontent')
    <div class="flex-grow-1 align-items-center">

        <!-- Main -->
        <main class="dashboard-main min-vh-100">
            <div class="d-flex flex-column gap-4 pb-110">
                <!-- Header -->
                <div>
                    <h3 class="text-24 fw-bold text-dark-300 mb-2">Create a Course</h3>
                    <ul class="d-flex align-items-center gap-2">
                        <li class="text-dark-200 fs-6">Dashboard</li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="5" height="11" viewBox="0 0 5 11"
                                fill="none">
                                <path d="M1 10L4 5.5L1 1" stroke="#5B5B5B" stroke-width="1.2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </li>
                        <li class="text-lime-300 fs-6">Create a Course</li>
                    </ul>
                </div>
                <!-- Content -->
                <div>
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                            <form action="{{ route('storecourselesson') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex flex-column gap-4">
                                    <!-- Project Info -->
                                    <div class="gig-info-card">
                                        <!-- Header -->
                                        <div class="gig-info-header">
                                            <h4 class="text-18 fw-semibold text-dark-300">
                                                Course Info
                                            </h4>
                                        </div>
                                        <div class="gig-info-body bg-white">
                                            <div class="row g-4">
                                                <!-- Display Success Message -->
                                                @if (session('success'))
                                                    <div class="alert alert-success alert-dismissible fade show"
                                                        role="alert">
                                                        {{ session('success') }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                @endif

                                                <!-- Display Error Message -->
                                                {{-- @if (session('error'))
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                        role="alert">
                                                        {{ session('error') }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                @endif --}}
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <div class="col-md-12">
                                                    <div class="form-container">
                                                        <label for="category" class="form-label">Select
                                                            Category*</label>
                                                        <select name="Course_id" id="CC_id" autocomplete="off"
                                                            class="form-select shadow-none">
                                                            @foreach ($course as $course)
                                                                <option value="{{ $course->C_id }}">{{ $course->C_title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-container">
                                                        <label for="title" class="form-label">Lesson Title*</label>
                                                        <input type="text" name="CL_lessonname"
                                                            class="form-control shadow-none"
                                                            placeholder="Brote - Cleanin Service Elementor Template Kit" required/>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="description" class="form-label">Description*</label>
                                                    <textarea class="form-control shadow-none" name="C_description" rows="4" required></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-container">
                                                        <label for="title" class="form-label">Video Lesson</label>
                                                        <input type="file" name="CL_videopath" accept="video/*"
                                                            class="form-control shadow-none" required/>
                                                        {{-- <input type="file" name="newlessonvideo" accept="video/*"
                                                            class="form-control shadow-none" required/> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Btn -->
                                    <div>
                                        <button class="w-btn-secondary-lg" type="submit">
                                            Publish Course Now
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10"
                                                viewBox="0 0 14 10" fill="none">
                                                <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="white" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
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
