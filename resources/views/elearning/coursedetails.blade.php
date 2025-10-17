@extends('layout.layout')

{{-- PageTitle --}}
@section('pagetitle')
    Home
@endsection


{{-- Main Content --}}
@section('maincontent')
    <main>
        <!-- Breadcrumb -->
        <section class="w-breadcrumb-area"
            style="
        background: url('{{ asset('assets/img/common/breadcrumb-bg.png') }}') no-repeat
          center center/cover;
      ">
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="position-relative z-2" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="linear">
                            <h2 class="section-title-light mb-2">Course Details</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb w-breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Services Details
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb End -->

        <!-- Services Details Start -->
        <section class="py-110 bg-offWhite">
            <div class="container">
                <div class="row">
                    <!-- Left -->
                    <div class="col-xl-9">
                        <!-- Slider -->
                        <div class="bg-white service-details-content">
                            <div class="swiper mySwiper2 mb-3">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="job-details-slider-img">
                                            {{-- @foreach ($course as $cour) --}}
                                            <img src="{{ asset('course_images/' . $course->C_image) }}"
                                                class="img-fluid w-100" />
                                            {{-- @endforeach --}}
                                        </div>
                                    </div>
                                    {{-- <div class="swiper-slide">
                                        <div class="job-details-slider-img">
                                            <img src="{{asset('assets/img/services/sl-xl-1.png')}}" class="img-fluid w-100" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="job-details-slider-img">
                                            <img src="{{asset('assets/img/services/sl-xl-1.png')}}" class="img-fluid w-100" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="job-details-slider-img">
                                            <img src="{{asset('assets/img/services/sl-xl-1.png')}}" class="img-fluid w-100" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="job-details-slider-img">
                                            <img src="{{asset('assets/img/services/sl-xl-1.png')}}" class="img-fluid w-100" />
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="swiper-nav-btn">
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div> --}}
                            </div>
                            {{-- <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="job-details-slider-img-thumb"></div>
                                        <img src="{{asset('assets/img/services/sl-th-1.png')}}" class="img-fluid w-100" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/img/services/sl-th-2.png')}}" class="img-fluid w-100" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/img/services/sl-th-3.png')}}" class="img-fluid w-100" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/img/services/sl-th-4.png')}}" class="img-fluid w-100" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/img/services/sl-th-3.png')}}" class="img-fluid w-100" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/img/services/sl-th-1.png')}}" class="img-fluid w-100" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/img/services/sl-th-2.png')}}" class="img-fluid w-100" />
                                    </div>
                                </div>
                            </div> --}}

                            <div class="mt-40">
                                <h2 class="service-details-title fw-bold mb-4">
                                    {{ $course->C_title }}
                                </h2>
                                <h3 class="service-details-subtitle fw-bold mb-3">
                                    About The Course
                                </h3>
                                <p class="text-dark-200 mb-4">
                                    {{ $course->C_description }}
                                </p>
                                <h4 class="fw-semibold text-dark-300 text-18 fw-semibold mb-2">
                                    No of Lessons:
                                </h4>
                                <p class="text-dark-200 mb-4">&nbsp;&nbsp;Total <span
                                        class="fw-bolder">{{ $countlessons }}</span> Lessons</p>
                                <h4 class="fw-semibold text-dark-300 text-18 fw-semibold mb-2">
                                    Lessons
                                </h4>
                                <ul class="list-group list-group-numbered border-0">
                                    @foreach ($totallessons as $lesson)
                                        <li class="list-group-item border-0 p-0">{{ $lesson->CL_lessonname }}</li>
                                    @endforeach
                                </ul>


                            </div>
                        </div>
                        <!-- Extra -->
                        <div class="pt-80">
                            <h3 class="service-details-title text-dark-200 fw-bold mb-30">
                                More Courses
                            </h3>
                            <div class="d-grid gap-3">
                                @foreach ($morecourses as $morecourse)
                                    <!-- Single -->
                                    <div
                                        class="p-3 bg-white d-flex flex-column flex-md-row align-items-md-center justify-content-between rounded-2">
                                        <div>
                                            <div class="d-flex flex-column flex-md-row align-items-md-center gap-3">
                                                <div>
                                                    <img class="rounded-3 img-fluid"
                                                        src="{{ asset('course_images/' . $morecourse->C_image) }}"
                                                        alt="" style="height: 110px; width: 150px;" />
                                                </div>
                                                <div>
                                                    <h4 class="fw-semibold text-dark-300 text-18 mb-2">
                                                        {{ $morecourse->C_title }}
                                                    </h4>
                                                    <p class="mb-3 text-dark-200">
                                                        {{ Str::limit($morecourse->C_description, 200) }}
                                                    </p>
                                                    <div class="d-inline-flex gap-2 align-items-center">
                                                        <label for="1">Catogory:
                                                            <b>{{ $morecourse->category->CC_name }}</b></label>
                                                    </div>
                                                    <div class="d-inline-flex gap-2 align-items-center">
                                                        <label for="1">&nbsp;&nbsp; Author:
                                                            <b>{{ $morecourse->author->user->firstname }}</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            @php
                                                $price = $morecourse->C_price ? $morecourse->C_price : 'Free';
                                            @endphp
                                            <h3 class="service-details-title fw-bold px-2">{{ $price }}</h3>
                                        </div>
                                    </div>
                                    <!-- Single -->
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <!-- Right -->
                    <div class="col-xl-3 mt-30 mt-xl-0">
                        <aside class="d-flex flex-column gap-4">
                            <div>
                                {{-- <nav>
                                    <div class="nav package-tabs d-flex gap-4 justify-content-between align-items-center"
                                        id="nav-tab" role="tablist">
                                        <button class="package-tab-btn active" id="nav-basic-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-basic" type="button" role="tab"
                                            aria-controls="nav-basic" aria-selected="true">
                                            Basic
                                        </button>
                                        <button class="package-tab-btn" id="nav-standard-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-standard" type="button" role="tab"
                                            aria-controls="nav-standard" aria-selected="false">
                                            Standard
                                        </button>
                                        <button class="package-tab-btn" id="nav-premium-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-premium" type="button" role="tab"
                                            aria-controls="nav-premium" aria-selected="false">
                                            Premium
                                        </button>
                                    </div>
                                </nav> --}}
                                <div class="package-tab-content bg-white">
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- Basic -->
                                        <div class="tab-pane fade show active" id="nav-basic" role="tabpanel"
                                            aria-labelledby="nav-basic-tab" tabindex="0">
                                            <div>
                                                <div class="d-flex mb-2 justify-content-between align-items-center">
                                                    @php
                                                        $courseprice = $course->C_price
                                                            ? '$' . $course->C_price
                                                            : 'Free';
                                                    @endphp
                                                    <h3 class="package-name fw-bold">{{ $courseprice }}</h3>
                                                    {{-- <h3 class="package-price fw-bold">$600</h3> --}}
                                                </div>
                                                <p class="text-dark-200 fs-6">
                                                    <b>{{ $course->C_title }}</b>
                                                </p>
                                                <!-- Display Error Message -->
                                                <p class="text-dark-200 fs-6 pt-3">
                                                    {{ str::limit($course->C_description, 150) }}
                                                </p>
                                                @if (session('error'))
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                        role="alert">
                                                        {{ session('error') }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                @endif
                                                <div class="mt-3">
                                                    @if ($courseenrolled && $courseenrolled->CE_status == 'completed')
                                                        <p class="text-dark-200 fs-6">
                                                            <b>You have already completed this course!</b>
                                                        </p>
                                                    @elseif($courseenrolled && $courseenrolled->CE_status == 'inprogress')
                                                        <a href="{{ asset('/student/startcourse/' . $course->C_id) }}"
                                                            class="w-btn-secondary-xl">
                                                            Continue Course
                                                            <svg width="14" height="10" viewBox="0 0 14 10"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="currentColor"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                    @else
                                                        @if (!session()->has('studentId') && !session()->has('freelancerId') && !session()->has('buyerId'))
                                                            <a href="{{ asset('/signin') }}" class="w-btn-secondary-xl">
                                                                Sign in as Student
                                                                <svg width="14" height="10" viewBox="0 0 14 10"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9 9L13 5M13 5L9 1M13 5L1 5"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </a>
                                                        @elseif (session()->has('freelancerId') && session()->get('freelancerId') == $course->author->FS_id)
                                                            <p class="text-dark-200 fs-6">
                                                                <b>Author not allowed to enroll in their own course</b>
                                                            </p>
                                                        @elseif (
                                                            (session()->has('freelancerId') || session()->has('buyerId')) &&
                                                                session()->get('freelancerId') != $course->author->FS_id &&
                                                                !session()->has('studentId'))
                                                            <a href="{{ asset('/student/regstartcourse/' . $course->C_id) }}"
                                                                class="w-btn-secondary-xl">
                                                                Register as Student <br>& Enroll Now
                                                                <svg width="14" height="10" viewBox="0 0 14 10"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9 9L13 5M13 5L9 1M13 5L1 5"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </a>
                                                        @else
                                                            <a href="{{ asset('/student/startcourse/' . $course->C_id) }}"
                                                                class="w-btn-secondary-xl">
                                                                Enroll Now
                                                                <svg width="14" height="10" viewBox="0 0 14 10"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9 9L13 5M13 5L9 1M13 5L1 5"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </a>
                                                        @endif
                                                    @endif


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="freelancer-sidebar-card p-4 rounded-4 bg-white position-relative">
                                <div class="job-type-badge position-absolute d-flex flex-column gap-2">
                                    <p class="job-type-badge-tertiary p-2">Author</p>
                                    <p class="job-type-badge-secondary p-2">Top Sepper</p>
                                </div>
                                <div
                                    class="freelancer-sidebar-card-header d-flex flex-column justify-content-center align-items-center py-4">
                                    <img src="{{ asset('profile_images/' . $course->author->user->profileimage) }}"
                                        class="freelancer-avatar rounded-circle mb-4" alt="" />
                                    <h3 class="fw-bold freelancer-name text-dark-300 mb-2">
                                        {{ $course->author->user->firstname }}&nbsp;{{ $course->author->user->lastname }}
                                    </h3>
                                    <p class="text-dark-200 mb-1">{{ $course->author->FS_role }}</p>
                                    <p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11"
                                            viewBox="0 0 12 11" fill="none">
                                            <path
                                                d="M11.1141 4.15628C11.0407 3.92385 10.8406 3.75929 10.6048 3.73731L7.38803 3.43649L6.11676 0.370622C6.0229 0.145376 5.80934 0 5.57163 0C5.33392 0 5.12027 0.145376 5.02701 0.370622L3.75574 3.43649L0.538508 3.73731C0.302669 3.75973 0.102963 3.92429 0.0291678 4.15628C-0.0442024 4.3887 0.0235566 4.64364 0.201923 4.80478L2.63351 7.0011L1.91656 10.2539C1.8641 10.493 1.95422 10.7403 2.14687 10.8838C2.25042 10.9613 2.37208 11 2.49417 11C2.59908 11 2.70407 10.9713 2.79785 10.9135L5.57163 9.20504L8.3449 10.9135C8.54835 11.0387 8.80417 11.0272 8.99639 10.8838C9.18904 10.7403 9.27916 10.493 9.22671 10.2539L8.50975 7.0011L10.9413 4.80478C11.1196 4.64364 11.1875 4.38923 11.1141 4.15628Z"
                                                fill="#06131C" />
                                        </svg>
                                        <span class="text-dark-300">4.9 </span>
                                        <span class="text-dark-200"> (399 Reviews)</span>
                                    </p>
                                </div>
                                {{-- <div class="d-flex gap-4 justify-content-between sidebar-rate-card p-4">
                                    <div>
                                        <p class="text-dark-300">Location</p>
                                        <p class="text-dark-200">{{$course->author->user->city}}, {{$course->author->user->country}}</p>
                                    </div>
                                     <div>
                                        <p class="text-dark-300">Rate</p>
                                        <p class="text-dark-200">$90/hr</p>
                                    </div>
                                    <div>
                                        <p class="text-dark-300">Jobs</p>
                                        <p class="text-dark-200">560</p>
                                    </div>
                                </div> --}}
                                {{-- <div class="d-grid">
                                    <a href="contact.html" class="w-btn-black-lg w-100">
                                        Contact Me
                                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div> --}}
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Details End -->
    </main>
@endsection
