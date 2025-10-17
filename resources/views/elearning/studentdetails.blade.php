@extends('layout.layout')

{{-- PageTitle --}}
@section('pagetitle')
    Student Details
@endsection


{{-- Main Content --}}
@section('maincontent')
    <!-- Main Start-->
    <main>
        <!-- Breadcrumb -->
        <section class="w-breadcrumb-area"
            style="background: url({{ asset('assets/img/common/breadcrumb-bg.png') }}) no-repeat
            center center/cover;">
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="position-relative z-2" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="linear">
                            <h2 class="section-title-light mb-2">Student Details</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb w-breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Student Details
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb End -->

        <!-- Freelancer Details -->
        <section class="bg-offWhite py-110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <aside class="freelancer-details-sidebar d-flex flex-column gap-4">
                            <div class="freelancer-sidebar-card p-4 rounded-4 bg-white position-relative">
                                <div
                                    class="freelancer-sidebar-card-header d-flex flex-column justify-content-center align-items-center py-4">
                                    <img src="{{ asset('profile_images/' . $student->user->profileimage) }}"
                                        class="freelancer-avatar rounded-circle mb-4" alt="" />
                                    <h3 class="fw-bold freelancer-name text-dark-300 mb-2">
                                        {{ $student->user->firstname }}&nbsp;{{ $student->user->lastname }}
                                    </h3>
                                </div>
                                {{-- <div
                                    class="d-flex gap-4 justify-content-between sidebar-rate-card bg-offWhite p-4 rounded-4">
                                    <div>
                                        <p class="text-dark-300 fw-medium">Location</p>
                                        <p class="text-dark-200">{{ $freelancerdetials->user->city }}, {{ $student->user->country }}</p>
                                    </div>
                                     <div>
                                        <p class="text-dark-300 fw-medium">Jobs</p>
                                        <p class="text-dark-200">560</p>
                                    </div>
                                </div> --}}
                                <ul class="gap-3 bg-offWhite py-4 px-3 rounded-4">
                                    <li class="py-1 d-flex justify-content-between align-items-center">
                                        <p class="text-dark-200">Location:</p>
                                        <p class="text-dark-300 fw-medium">{{ $student->user->city }},
                                            {{ $student->user->country }}</p>
                                    </li>
                                    <li class="py-1 d-flex justify-content-between align-items-center">
                                        <p class="text-dark-200">Member Since:</p>
                                        <p class="text-dark-300 fw-medium">
                                            {{ $student->user->created_at->format('F j, Y') }}</p>
                                    </li>
                                    <li class="py-1 d-flex justify-content-between align-items-center">
                                        <p class="text-dark-200">Gender:</p>
                                        <p class="text-dark-300 fw-medium">{{ $student->user->gender }}</p>
                                    </li>
                                    <li class="py-1 d-flex justify-content-between align-items-center">
                                        <p class="text-dark-200">Language:</p>
                                        <p class="text-dark-300 fw-medium">{{ $student->user->language }}</p>
                                    </li>
                                </ul>
                                {{-- <a href="contact.html" class="w-btn-secondary-lg w-100">
                                    Contact Me
                                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a> --}}
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div>
                            <div class="bg-white freelancer-tab-content">
                                <div class="mb-5">
                                    <h3 class="fw-bold freelancer-name text-dark-300 mb-2">
                                        Enrolled Courses
                                    </h3>
                                </div>
                                @if ($enrolledcourses->isNotEmpty())
                                    <div class="row g-4">
                                        @foreach ($enrolledcourses as $enroledcourse)
                                            <article class="col-xl-6 col-lg-6 col-md-6 mb-4">
                                                <div
                                                    class="service-card-horizontal align-items-sm-center d-flex flex-column flex-sm-row gap-3 bg-offWhite">
                                                    <div class="position-relative flex-shrink-0">
                                                        <img src="{{ asset('course_images/' . $enroledcourse->courses->C_image) }}"
                                                            class="w-100" alt=""
                                                            style="height: 158px; width: 125px !important; border-radius: 8px;" />
                                                    </div>
                                                    <div class="service-card-content p-0">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                @php
                                                                    $courseprice = $enroledcourse->courses->C_price
                                                                        ? '$' . $enroledcourse->courses->C_price
                                                                        : 'Free';
                                                                @endphp
                                                                <h3 class="service-card-price fw-bold">{{ $courseprice }}
                                                                </h3>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-1">
                                                                <svg class="text-lime-300"
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="15" viewBox="0 0 16 15" fill="none">
                                                                    <path
                                                                        d="M16 5.95909C15.8855 6.07153 15.7709 6.21207 15.6564 6.32451C14.4537 7.36454 13.2511 8.37646 12.0484 9.38838C11.9339 9.47271 11.9053 9.55704 11.9625 9.69758C12.3348 11.2717 12.707 12.8739 13.0793 14.448C13.1365 14.6448 13.1079 14.8134 12.9361 14.9258C12.7643 15.0383 12.5925 15.0102 12.4207 14.9258C10.989 14.0826 9.58587 13.2393 8.15415 12.396C8.03961 12.3117 7.9537 12.3117 7.83917 12.396C6.43607 13.2393 5.00435 14.0826 3.60126 14.8977C3.48672 14.9821 3.34355 15.0102 3.20038 14.9821C2.9713 14.9258 2.85676 14.701 2.91403 14.448C3.14311 13.5204 3.34355 12.5928 3.57262 11.6652C3.74443 10.9906 3.8876 10.316 4.05941 9.64136C4.08805 9.52893 4.05941 9.47271 3.97351 9.38838C2.74222 8.34835 1.53957 7.30832 0.308291 6.26829C0.251022 6.21207 0.193753 6.18396 0.165118 6.12775C0.0219457 6.01531 -0.0353233 5.87477 0.0219457 5.678C0.0792147 5.50935 0.222387 5.42502 0.394194 5.39691C0.651905 5.36881 0.909615 5.3407 1.19596 5.3407C2.36998 5.22826 3.54399 5.14393 4.74664 5.0315C4.97572 5.00339 5.20479 4.97528 5.43387 4.97528C5.54841 4.97528 5.60567 4.91906 5.63431 4.83474C6.2929 3.31685 6.92286 1.82708 7.58146 0.309198C7.66736 0.140545 7.75326 0.0281089 7.9537 0C8.18278 0.0562179 8.32595 0.140545 8.41186 0.365416C8.75547 1.15247 9.09908 1.96762 9.4427 2.75467C9.75768 3.4574 10.044 4.18823 10.359 4.89095C10.3876 4.97528 10.4449 5.0315 10.5594 5.0315C11.4757 5.11583 12.3921 5.17204 13.337 5.25637C14.0815 5.31259 14.8546 5.39691 15.5991 5.45313C15.7996 5.48124 15.9141 5.59368 16 5.76233C16 5.81855 16 5.90288 16 5.95909Z"
                                                                        fill="currentColor" />
                                                                </svg>
                                                                <span class="service-card-rating">4.8 (2k)</span>
                                                            </div>
                                                        </div>
                                                        <h3 class="service-card-title fw-semibold">
                                                            <a
                                                                href="{{ asset('/student/coursedetails/' . $enroledcourse->courses->C_id) }}">
                                                                {{ Str::limit($enroledcourse->courses->C_title, 45) }}
                                                            </a>
                                                        </h3>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div
                                                                class="d-flex align-items-center service-card-author horizontal">
                                                                <img src="{{ asset('profile_images/' . $enroledcourse->courses->author->user->profileimage) }}"
                                                                    class="service-card-author-img" alt="" />
                                                                <a href="#"
                                                                    class="service-card-author-name">{{ $enroledcourse->courses->author->user->firstname ?? 'Author' }}</a>
                                                            </div>
                                                            <div>
                                                                <button class="wishlist-btn-horizontal">
                                                                    <svg width="20" height="18" viewBox="0 0 20 18"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10.6803 2.51314L10.0002 3.24375L9.32017 2.51315C7.44229 0.495619 4.39763 0.495618 2.51974 2.51314C0.641857 4.53067 0.641856 7.80172 2.51974 9.81925L8.64013 16.3947C9.39128 17.2018 10.6091 17.2018 11.3603 16.3947L17.4807 9.81925C19.3586 7.80172 19.3586 4.53067 17.4807 2.51314C15.6028 0.495619 12.5581 0.495619 10.6803 2.51314Z"
                                                                            stroke="currentColor" stroke-linejoin="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <h2 class="text-center">No courses Enrolled!</h2>
                                    </div>
                                @endif

                                <div class="mb-5 mt-5">
                                    <h4 class="fw-bold freelancer-name text-dark-300 mb-2">
                                        Courses Completed
                                    </h4>
                                </div>
                                @if ($completedcourses->isNotEmpty())
                                    <div class="row g-4">
                                        @foreach ($completedcourses as $completedcourse)
                                            <article class="col-xl-6 col-lg-6 col-md-6 mb-4">
                                                <div
                                                    class="service-card-horizontal align-items-sm-center d-flex flex-column flex-sm-row gap-3 bg-offWhite">
                                                    <div class="position-relative flex-shrink-0">
                                                        <img src="{{ asset('course_images/' . $completedcourse->courses->C_image) }}"
                                                            class="w-100" alt=""
                                                            style="height: 158px; width: 125px !important; border-radius: 8px;" />
                                                    </div>
                                                    <div class="service-card-content p-0">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                @php
                                                                    $courseprice = $completedcourse->courses->C_price
                                                                        ? '$' . $completedcourse->courses->C_price
                                                                        : 'Free';
                                                                @endphp
                                                                <h3 class="service-card-price fw-bold">{{ $courseprice }}
                                                                </h3>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-1">
                                                                <svg class="text-lime-300"
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="15" viewBox="0 0 16 15" fill="none">
                                                                    <path
                                                                        d="M16 5.95909C15.8855 6.07153 15.7709 6.21207 15.6564 6.32451C14.4537 7.36454 13.2511 8.37646 12.0484 9.38838C11.9339 9.47271 11.9053 9.55704 11.9625 9.69758C12.3348 11.2717 12.707 12.8739 13.0793 14.448C13.1365 14.6448 13.1079 14.8134 12.9361 14.9258C12.7643 15.0383 12.5925 15.0102 12.4207 14.9258C10.989 14.0826 9.58587 13.2393 8.15415 12.396C8.03961 12.3117 7.9537 12.3117 7.83917 12.396C6.43607 13.2393 5.00435 14.0826 3.60126 14.8977C3.48672 14.9821 3.34355 15.0102 3.20038 14.9821C2.9713 14.9258 2.85676 14.701 2.91403 14.448C3.14311 13.5204 3.34355 12.5928 3.57262 11.6652C3.74443 10.9906 3.8876 10.316 4.05941 9.64136C4.08805 9.52893 4.05941 9.47271 3.97351 9.38838C2.74222 8.34835 1.53957 7.30832 0.308291 6.26829C0.251022 6.21207 0.193753 6.18396 0.165118 6.12775C0.0219457 6.01531 -0.0353233 5.87477 0.0219457 5.678C0.0792147 5.50935 0.222387 5.42502 0.394194 5.39691C0.651905 5.36881 0.909615 5.3407 1.19596 5.3407C2.36998 5.22826 3.54399 5.14393 4.74664 5.0315C4.97572 5.00339 5.20479 4.97528 5.43387 4.97528C5.54841 4.97528 5.60567 4.91906 5.63431 4.83474C6.2929 3.31685 6.92286 1.82708 7.58146 0.309198C7.66736 0.140545 7.75326 0.0281089 7.9537 0C8.18278 0.0562179 8.32595 0.140545 8.41186 0.365416C8.75547 1.15247 9.09908 1.96762 9.4427 2.75467C9.75768 3.4574 10.044 4.18823 10.359 4.89095C10.3876 4.97528 10.4449 5.0315 10.5594 5.0315C11.4757 5.11583 12.3921 5.17204 13.337 5.25637C14.0815 5.31259 14.8546 5.39691 15.5991 5.45313C15.7996 5.48124 15.9141 5.59368 16 5.76233C16 5.81855 16 5.90288 16 5.95909Z"
                                                                        fill="currentColor" />
                                                                </svg>
                                                                <span class="service-card-rating">4.8 (2k)</span>
                                                            </div>
                                                        </div>
                                                        <h3 class="service-card-title fw-semibold">
                                                            <a
                                                                href="{{ asset('/student/coursedetails/' . $completedcourse->courses->C_id) }}">
                                                                {{ Str::limit($completedcourse->courses->C_title, 45) }}
                                                            </a>
                                                        </h3>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div
                                                                class="d-flex align-items-center service-card-author horizontal">
                                                                <img src="{{ asset('profile_images/' . $completedcourse->courses->author->user->profileimage) }}"
                                                                    class="service-card-author-img" alt="" />
                                                                <a href="#"
                                                                    class="service-card-author-name">{{ $completedcourse->courses->author->user->firstname ?? 'Author' }}</a>
                                                            </div>
                                                            <div>
                                                                <button class="wishlist-btn-horizontal">
                                                                    <svg width="20" height="18"
                                                                        viewBox="0 0 20 18" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10.6803 2.51314L10.0002 3.24375L9.32017 2.51315C7.44229 0.495619 4.39763 0.495618 2.51974 2.51314C0.641857 4.53067 0.641856 7.80172 2.51974 9.81925L8.64013 16.3947C9.39128 17.2018 10.6091 17.2018 11.3603 16.3947L17.4807 9.81925C19.3586 7.80172 19.3586 4.53067 17.4807 2.51314C15.6028 0.495619 12.5581 0.495619 10.6803 2.51314Z"
                                                                            stroke="currentColor"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <h4 class="text-center">No courses Completed!</h4>
                                    </div>
                                @endif

                            </div>
                            <!-- Tab Nav -->
                            {{-- <div class="bg-white d-flex gap-3 p-4 freelancer-tab mb-4" id="nav-tab" role="tablist">
                                <button class="tab-btn active" id="nav-service-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-service" type="button" role="tab"
                                    aria-controls="nav-service" aria-selected="true">
                                    Gig Service
                                </button>
                                <button class="tab-btn" id="nav-portfolio-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-portfolio" type="button" role="tab"
                                    aria-controls="nav-portfolio" aria-selected="false">
                                    Portfolio
                                </button>
                            </div> --}}
                            {{-- <div class="bg-white freelancer-tab-content">
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- Services -->
                                    <div class="tab-pane fade show active" id="nav-service" role="tabpanel"
                                        aria-labelledby="nav-service-tab" tabindex="0">
                                        <div class="row g-4">
                                            <article class="col-xl-4 col-md-6">
                                                <div class="service-card bg-white w-shadow">
                                                    <div class="position-relative">
                                                        <img src="assets/img/services/1.png"
                                                            class="recently-view-card-img w-100" alt="" />
                                                        <button class="service-card-wishlist-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 32 32" fill="none">
                                                                <circle cx="16" cy="16" r="16"
                                                                    fill="white" />
                                                                <path
                                                                    d="M16.68 9.51314L16 10.2438L15.3199 9.51315C13.442 7.49562 10.3974 7.49562 8.5195 9.51314C6.64161 11.5307 6.64161 14.8017 8.5195 16.8192L14.6399 23.3947C15.391 24.2018 16.6089 24.2018 17.3601 23.3947L23.4804 16.8192C25.3583 14.8017 25.3583 11.5307 23.4804 9.51314C21.6026 7.49562 18.5579 7.49562 16.68 9.51314Z"
                                                                    stroke="#22BE0D" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="service-card-content">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h3 class="service-card-price fw-bold">
                                                                    $15
                                                                </h3>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="15" viewBox="0 0 16 15"
                                                                    fill="none">
                                                                    <path
                                                                        d="M16 5.95909C15.8855 6.07153 15.7709 6.21207 15.6564 6.32451C14.4537 7.36454 13.2511 8.37646 12.0484 9.38838C11.9339 9.47271 11.9053 9.55704 11.9625 9.69758C12.3348 11.2717 12.707 12.8739 13.0793 14.448C13.1365 14.6448 13.1079 14.8134 12.9361 14.9258C12.7643 15.0383 12.5925 15.0102 12.4207 14.9258C10.989 14.0826 9.58587 13.2393 8.15415 12.396C8.03961 12.3117 7.9537 12.3117 7.83917 12.396C6.43607 13.2393 5.00435 14.0826 3.60126 14.8977C3.48672 14.9821 3.34355 15.0102 3.20038 14.9821C2.9713 14.9258 2.85676 14.701 2.91403 14.448C3.14311 13.5204 3.34355 12.5928 3.57262 11.6652C3.74443 10.9906 3.8876 10.316 4.05941 9.64136C4.08805 9.52893 4.05941 9.47271 3.97351 9.38838C2.74222 8.34835 1.53957 7.30832 0.308291 6.26829C0.251022 6.21207 0.193753 6.18396 0.165118 6.12775C0.0219457 6.01531 -0.0353233 5.87477 0.0219457 5.678C0.0792147 5.50935 0.222387 5.42502 0.394194 5.39691C0.651905 5.36881 0.909615 5.3407 1.19596 5.3407C2.36998 5.22826 3.54399 5.14393 4.74664 5.0315C4.97572 5.00339 5.20479 4.97528 5.43387 4.97528C5.54841 4.97528 5.60567 4.91906 5.63431 4.83474C6.2929 3.31685 6.92286 1.82708 7.58146 0.309198C7.66736 0.140545 7.75326 0.0281089 7.9537 0C8.18278 0.0562179 8.32595 0.140545 8.41186 0.365416C8.75547 1.15247 9.09908 1.96762 9.4427 2.75467C9.75768 3.4574 10.044 4.18823 10.359 4.89095C10.3876 4.97528 10.4449 5.0315 10.5594 5.0315C11.4757 5.11583 12.3921 5.17204 13.337 5.25637C14.0815 5.31259 14.8546 5.39691 15.5991 5.45313C15.7996 5.48124 15.9141 5.59368 16 5.76233C16 5.81855 16 5.90288 16 5.95909Z"
                                                                        fill="#22BE0D" />
                                                                </svg>
                                                                <span class="service-card-rating">4.8 (2k)</span>
                                                            </div>
                                                        </div>
                                                        <h3 class="service-card-title fw-semibold">
                                                            <a href="#">
                                                                Brote - Cleaning Service Elementor
                                                            </a>
                                                        </h3>
                                                        <div class="d-flex align-items-center service-card-author">
                                                            <img src="assets/img/avatar/u-sm-1.png"
                                                                class="service-card-author-img" alt="" />
                                                            <a href="#"
                                                                class="service-card-author-name">Nankathan</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="service-card bg-white w-shadow">
                                                    <div class="position-relative">
                                                        <img src="assets/img/services/2.png"
                                                            class="recently-view-card-img w-100" alt="" />
                                                        <button class="service-card-wishlist-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 32 32" fill="none">
                                                                <circle cx="16" cy="16" r="16"
                                                                    fill="white" />
                                                                <path
                                                                    d="M16.68 9.51314L16 10.2438L15.3199 9.51315C13.442 7.49562 10.3974 7.49562 8.5195 9.51314C6.64161 11.5307 6.64161 14.8017 8.5195 16.8192L14.6399 23.3947C15.391 24.2018 16.6089 24.2018 17.3601 23.3947L23.4804 16.8192C25.3583 14.8017 25.3583 11.5307 23.4804 9.51314C21.6026 7.49562 18.5579 7.49562 16.68 9.51314Z"
                                                                    stroke="#22BE0D" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="service-card-content">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h3 class="service-card-price fw-bold">
                                                                    $15
                                                                </h3>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="15" viewBox="0 0 16 15"
                                                                    fill="none">
                                                                    <path
                                                                        d="M16 5.95909C15.8855 6.07153 15.7709 6.21207 15.6564 6.32451C14.4537 7.36454 13.2511 8.37646 12.0484 9.38838C11.9339 9.47271 11.9053 9.55704 11.9625 9.69758C12.3348 11.2717 12.707 12.8739 13.0793 14.448C13.1365 14.6448 13.1079 14.8134 12.9361 14.9258C12.7643 15.0383 12.5925 15.0102 12.4207 14.9258C10.989 14.0826 9.58587 13.2393 8.15415 12.396C8.03961 12.3117 7.9537 12.3117 7.83917 12.396C6.43607 13.2393 5.00435 14.0826 3.60126 14.8977C3.48672 14.9821 3.34355 15.0102 3.20038 14.9821C2.9713 14.9258 2.85676 14.701 2.91403 14.448C3.14311 13.5204 3.34355 12.5928 3.57262 11.6652C3.74443 10.9906 3.8876 10.316 4.05941 9.64136C4.08805 9.52893 4.05941 9.47271 3.97351 9.38838C2.74222 8.34835 1.53957 7.30832 0.308291 6.26829C0.251022 6.21207 0.193753 6.18396 0.165118 6.12775C0.0219457 6.01531 -0.0353233 5.87477 0.0219457 5.678C0.0792147 5.50935 0.222387 5.42502 0.394194 5.39691C0.651905 5.36881 0.909615 5.3407 1.19596 5.3407C2.36998 5.22826 3.54399 5.14393 4.74664 5.0315C4.97572 5.00339 5.20479 4.97528 5.43387 4.97528C5.54841 4.97528 5.60567 4.91906 5.63431 4.83474C6.2929 3.31685 6.92286 1.82708 7.58146 0.309198C7.66736 0.140545 7.75326 0.0281089 7.9537 0C8.18278 0.0562179 8.32595 0.140545 8.41186 0.365416C8.75547 1.15247 9.09908 1.96762 9.4427 2.75467C9.75768 3.4574 10.044 4.18823 10.359 4.89095C10.3876 4.97528 10.4449 5.0315 10.5594 5.0315C11.4757 5.11583 12.3921 5.17204 13.337 5.25637C14.0815 5.31259 14.8546 5.39691 15.5991 5.45313C15.7996 5.48124 15.9141 5.59368 16 5.76233C16 5.81855 16 5.90288 16 5.95909Z"
                                                                        fill="#22BE0D" />
                                                                </svg>
                                                                <span class="service-card-rating">4.8 (2k)</span>
                                                            </div>
                                                        </div>
                                                        <h3 class="service-card-title fw-semibold">
                                                            <a href="#">
                                                                Brote - Cleaning Service Elementor
                                                            </a>
                                                        </h3>
                                                        <div class="d-flex align-items-center service-card-author">
                                                            <img src="assets/img/avatar/u-sm-1.png"
                                                                class="service-card-author-img" alt="" />
                                                            <a href="#"
                                                                class="service-card-author-name">Nankathan</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="service-card bg-white w-shadow">
                                                    <div class="position-relative">
                                                        <img src="assets/img/services/3.png"
                                                            class="recently-view-card-img w-100" alt="" />
                                                        <button class="service-card-wishlist-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 32 32" fill="none">
                                                                <circle cx="16" cy="16" r="16"
                                                                    fill="white" />
                                                                <path
                                                                    d="M16.68 9.51314L16 10.2438L15.3199 9.51315C13.442 7.49562 10.3974 7.49562 8.5195 9.51314C6.64161 11.5307 6.64161 14.8017 8.5195 16.8192L14.6399 23.3947C15.391 24.2018 16.6089 24.2018 17.3601 23.3947L23.4804 16.8192C25.3583 14.8017 25.3583 11.5307 23.4804 9.51314C21.6026 7.49562 18.5579 7.49562 16.68 9.51314Z"
                                                                    stroke="#22BE0D" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="service-card-content">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h3 class="service-card-price fw-bold">
                                                                    $15
                                                                </h3>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="15" viewBox="0 0 16 15"
                                                                    fill="none">
                                                                    <path
                                                                        d="M16 5.95909C15.8855 6.07153 15.7709 6.21207 15.6564 6.32451C14.4537 7.36454 13.2511 8.37646 12.0484 9.38838C11.9339 9.47271 11.9053 9.55704 11.9625 9.69758C12.3348 11.2717 12.707 12.8739 13.0793 14.448C13.1365 14.6448 13.1079 14.8134 12.9361 14.9258C12.7643 15.0383 12.5925 15.0102 12.4207 14.9258C10.989 14.0826 9.58587 13.2393 8.15415 12.396C8.03961 12.3117 7.9537 12.3117 7.83917 12.396C6.43607 13.2393 5.00435 14.0826 3.60126 14.8977C3.48672 14.9821 3.34355 15.0102 3.20038 14.9821C2.9713 14.9258 2.85676 14.701 2.91403 14.448C3.14311 13.5204 3.34355 12.5928 3.57262 11.6652C3.74443 10.9906 3.8876 10.316 4.05941 9.64136C4.08805 9.52893 4.05941 9.47271 3.97351 9.38838C2.74222 8.34835 1.53957 7.30832 0.308291 6.26829C0.251022 6.21207 0.193753 6.18396 0.165118 6.12775C0.0219457 6.01531 -0.0353233 5.87477 0.0219457 5.678C0.0792147 5.50935 0.222387 5.42502 0.394194 5.39691C0.651905 5.36881 0.909615 5.3407 1.19596 5.3407C2.36998 5.22826 3.54399 5.14393 4.74664 5.0315C4.97572 5.00339 5.20479 4.97528 5.43387 4.97528C5.54841 4.97528 5.60567 4.91906 5.63431 4.83474C6.2929 3.31685 6.92286 1.82708 7.58146 0.309198C7.66736 0.140545 7.75326 0.0281089 7.9537 0C8.18278 0.0562179 8.32595 0.140545 8.41186 0.365416C8.75547 1.15247 9.09908 1.96762 9.4427 2.75467C9.75768 3.4574 10.044 4.18823 10.359 4.89095C10.3876 4.97528 10.4449 5.0315 10.5594 5.0315C11.4757 5.11583 12.3921 5.17204 13.337 5.25637C14.0815 5.31259 14.8546 5.39691 15.5991 5.45313C15.7996 5.48124 15.9141 5.59368 16 5.76233C16 5.81855 16 5.90288 16 5.95909Z"
                                                                        fill="#22BE0D" />
                                                                </svg>
                                                                <span class="service-card-rating">4.8 (2k)</span>
                                                            </div>
                                                        </div>
                                                        <h3 class="service-card-title fw-semibold">
                                                            <a href="#">
                                                                Brote - Cleaning Service Elementor
                                                            </a>
                                                        </h3>
                                                        <div class="d-flex align-items-center service-card-author">
                                                            <img src="assets/img/avatar/u-sm-1.png"
                                                                class="service-card-author-img" alt="" />
                                                            <a href="#"
                                                                class="service-card-author-name">Nankathan</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="service-card bg-white w-shadow">
                                                    <div class="position-relative">
                                                        <img src="assets/img/services/4.png"
                                                            class="recently-view-card-img w-100" alt="" />
                                                        <button class="service-card-wishlist-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 32 32" fill="none">
                                                                <circle cx="16" cy="16" r="16"
                                                                    fill="white" />
                                                                <path
                                                                    d="M16.68 9.51314L16 10.2438L15.3199 9.51315C13.442 7.49562 10.3974 7.49562 8.5195 9.51314C6.64161 11.5307 6.64161 14.8017 8.5195 16.8192L14.6399 23.3947C15.391 24.2018 16.6089 24.2018 17.3601 23.3947L23.4804 16.8192C25.3583 14.8017 25.3583 11.5307 23.4804 9.51314C21.6026 7.49562 18.5579 7.49562 16.68 9.51314Z"
                                                                    stroke="#22BE0D" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="service-card-content">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h3 class="service-card-price fw-bold">
                                                                    $15
                                                                </h3>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="15" viewBox="0 0 16 15"
                                                                    fill="none">
                                                                    <path
                                                                        d="M16 5.95909C15.8855 6.07153 15.7709 6.21207 15.6564 6.32451C14.4537 7.36454 13.2511 8.37646 12.0484 9.38838C11.9339 9.47271 11.9053 9.55704 11.9625 9.69758C12.3348 11.2717 12.707 12.8739 13.0793 14.448C13.1365 14.6448 13.1079 14.8134 12.9361 14.9258C12.7643 15.0383 12.5925 15.0102 12.4207 14.9258C10.989 14.0826 9.58587 13.2393 8.15415 12.396C8.03961 12.3117 7.9537 12.3117 7.83917 12.396C6.43607 13.2393 5.00435 14.0826 3.60126 14.8977C3.48672 14.9821 3.34355 15.0102 3.20038 14.9821C2.9713 14.9258 2.85676 14.701 2.91403 14.448C3.14311 13.5204 3.34355 12.5928 3.57262 11.6652C3.74443 10.9906 3.8876 10.316 4.05941 9.64136C4.08805 9.52893 4.05941 9.47271 3.97351 9.38838C2.74222 8.34835 1.53957 7.30832 0.308291 6.26829C0.251022 6.21207 0.193753 6.18396 0.165118 6.12775C0.0219457 6.01531 -0.0353233 5.87477 0.0219457 5.678C0.0792147 5.50935 0.222387 5.42502 0.394194 5.39691C0.651905 5.36881 0.909615 5.3407 1.19596 5.3407C2.36998 5.22826 3.54399 5.14393 4.74664 5.0315C4.97572 5.00339 5.20479 4.97528 5.43387 4.97528C5.54841 4.97528 5.60567 4.91906 5.63431 4.83474C6.2929 3.31685 6.92286 1.82708 7.58146 0.309198C7.66736 0.140545 7.75326 0.0281089 7.9537 0C8.18278 0.0562179 8.32595 0.140545 8.41186 0.365416C8.75547 1.15247 9.09908 1.96762 9.4427 2.75467C9.75768 3.4574 10.044 4.18823 10.359 4.89095C10.3876 4.97528 10.4449 5.0315 10.5594 5.0315C11.4757 5.11583 12.3921 5.17204 13.337 5.25637C14.0815 5.31259 14.8546 5.39691 15.5991 5.45313C15.7996 5.48124 15.9141 5.59368 16 5.76233C16 5.81855 16 5.90288 16 5.95909Z"
                                                                        fill="#22BE0D" />
                                                                </svg>
                                                                <span class="service-card-rating">4.8 (2k)</span>
                                                            </div>
                                                        </div>
                                                        <h3 class="service-card-title fw-semibold">
                                                            <a href="#">
                                                                Brote - Cleaning Service Elementor
                                                            </a>
                                                        </h3>
                                                        <div class="d-flex align-items-center service-card-author">
                                                            <img src="assets/img/avatar/u-sm-1.png"
                                                                class="service-card-author-img" alt="" />
                                                            <a href="#"
                                                                class="service-card-author-name">Nankathan</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="service-card bg-white w-shadow">
                                                    <div class="position-relative">
                                                        <img src="assets/img/services/5.png"
                                                            class="recently-view-card-img w-100" alt="" />
                                                        <button class="service-card-wishlist-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 32 32" fill="none">
                                                                <circle cx="16" cy="16" r="16"
                                                                    fill="white" />
                                                                <path
                                                                    d="M16.68 9.51314L16 10.2438L15.3199 9.51315C13.442 7.49562 10.3974 7.49562 8.5195 9.51314C6.64161 11.5307 6.64161 14.8017 8.5195 16.8192L14.6399 23.3947C15.391 24.2018 16.6089 24.2018 17.3601 23.3947L23.4804 16.8192C25.3583 14.8017 25.3583 11.5307 23.4804 9.51314C21.6026 7.49562 18.5579 7.49562 16.68 9.51314Z"
                                                                    stroke="#22BE0D" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="service-card-content">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h3 class="service-card-price fw-bold">
                                                                    $15
                                                                </h3>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="15" viewBox="0 0 16 15"
                                                                    fill="none">
                                                                    <path
                                                                        d="M16 5.95909C15.8855 6.07153 15.7709 6.21207 15.6564 6.32451C14.4537 7.36454 13.2511 8.37646 12.0484 9.38838C11.9339 9.47271 11.9053 9.55704 11.9625 9.69758C12.3348 11.2717 12.707 12.8739 13.0793 14.448C13.1365 14.6448 13.1079 14.8134 12.9361 14.9258C12.7643 15.0383 12.5925 15.0102 12.4207 14.9258C10.989 14.0826 9.58587 13.2393 8.15415 12.396C8.03961 12.3117 7.9537 12.3117 7.83917 12.396C6.43607 13.2393 5.00435 14.0826 3.60126 14.8977C3.48672 14.9821 3.34355 15.0102 3.20038 14.9821C2.9713 14.9258 2.85676 14.701 2.91403 14.448C3.14311 13.5204 3.34355 12.5928 3.57262 11.6652C3.74443 10.9906 3.8876 10.316 4.05941 9.64136C4.08805 9.52893 4.05941 9.47271 3.97351 9.38838C2.74222 8.34835 1.53957 7.30832 0.308291 6.26829C0.251022 6.21207 0.193753 6.18396 0.165118 6.12775C0.0219457 6.01531 -0.0353233 5.87477 0.0219457 5.678C0.0792147 5.50935 0.222387 5.42502 0.394194 5.39691C0.651905 5.36881 0.909615 5.3407 1.19596 5.3407C2.36998 5.22826 3.54399 5.14393 4.74664 5.0315C4.97572 5.00339 5.20479 4.97528 5.43387 4.97528C5.54841 4.97528 5.60567 4.91906 5.63431 4.83474C6.2929 3.31685 6.92286 1.82708 7.58146 0.309198C7.66736 0.140545 7.75326 0.0281089 7.9537 0C8.18278 0.0562179 8.32595 0.140545 8.41186 0.365416C8.75547 1.15247 9.09908 1.96762 9.4427 2.75467C9.75768 3.4574 10.044 4.18823 10.359 4.89095C10.3876 4.97528 10.4449 5.0315 10.5594 5.0315C11.4757 5.11583 12.3921 5.17204 13.337 5.25637C14.0815 5.31259 14.8546 5.39691 15.5991 5.45313C15.7996 5.48124 15.9141 5.59368 16 5.76233C16 5.81855 16 5.90288 16 5.95909Z"
                                                                        fill="#22BE0D" />
                                                                </svg>
                                                                <span class="service-card-rating">4.8 (2k)</span>
                                                            </div>
                                                        </div>
                                                        <h3 class="service-card-title fw-semibold">
                                                            <a href="#">
                                                                Brote - Cleaning Service Elementor
                                                            </a>
                                                        </h3>
                                                        <div class="d-flex align-items-center service-card-author">
                                                            <img src="assets/img/avatar/u-sm-1.png"
                                                                class="service-card-author-img" alt="" />
                                                            <a href="#"
                                                                class="service-card-author-name">Nankathan</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    <!-- Portfolio -->
                                    <div class="tab-pane fade" id="nav-portfolio" role="tabpanel"
                                        aria-labelledby="nav-portfolio-tab" tabindex="0">
                                        <div class="row g-4">
                                            <article class="col-xl-4 col-md-6">
                                                <div class="bg-white p-2 portfolio-card">
                                                    <img src="assets/img/freelancer/p-1.png" class="img-fluid w-100"
                                                        alt="" />
                                                    <div class="portfolio-card-overlay">
                                                        <a href="assets/img/freelancer/p-xl.jpeg"
                                                            class="portfolio-card-icon gallery">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="39"
                                                                height="39" viewBox="0 0 39 39" fill="none">
                                                                <path
                                                                    d="M37.2245 24.8216C36.4083 24.8216 35.7486 25.4813 35.7486 26.2975V33.1708L23.8381 21.2588C23.5503 20.971 23.1725 20.8264 22.7946 20.8264C22.4168 20.8264 22.039 20.971 21.7512 21.2588C21.1741 21.8359 21.1741 22.7686 21.7512 23.3457L33.6602 35.2562H26.7899C25.9737 35.2562 25.314 35.9159 25.314 36.7321C25.314 37.5483 25.9737 38.208 26.7899 38.208H37.2245C38.0406 38.208 38.7004 37.5483 38.7004 36.7321V26.2975C38.7004 25.4828 38.0406 24.8216 37.2245 24.8216Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M5.20277 2.95179H12.0745C12.8907 2.95179 13.5504 2.29207 13.5504 1.4759C13.5504 0.659726 12.8907 0 12.0745 0H1.63996C0.823788 0 0.164062 0.659726 0.164062 1.4759V11.9105C0.164062 12.7267 0.823788 13.3864 1.63996 13.3864C2.45613 13.3864 3.11586 12.7267 3.11586 11.9105V5.03871L15.1916 17.1145C15.7687 17.6916 16.7015 17.6916 17.2786 17.1145C17.8556 16.5374 17.8556 15.6047 17.2786 15.0276L5.20277 2.95179Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M15.9057 20.8264C15.5279 20.8264 15.1501 20.971 14.8623 21.2588L2.95179 33.1708V26.2975C2.95179 25.4813 2.29207 24.8216 1.4759 24.8216C0.659726 24.8216 0 25.4813 0 26.2975V36.7321C0 37.5483 0.659726 38.208 1.4759 38.208H11.9105C12.7267 38.208 13.3864 37.5483 13.3864 36.7321C13.3864 35.9159 12.7267 35.2562 11.9105 35.2562H5.04019L16.9492 23.3457C17.5263 22.7686 17.5263 21.8359 16.9492 21.2588C16.6614 20.971 16.2836 20.8264 15.9057 20.8264Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M23.51 17.1145L35.5857 5.03871V11.9105C35.5857 12.7267 36.2455 13.3864 37.0616 13.3864C37.8778 13.3864 38.5375 12.7267 38.5375 11.9105V1.4759C38.5375 0.659726 37.8778 0 37.0616 0H26.6271C25.8109 0 25.1512 0.659726 25.1512 1.4759C25.1512 2.29207 25.8109 2.95179 26.6271 2.95179H33.4988L21.423 15.0276C20.846 15.6047 20.846 16.5374 21.423 17.1145C22.0001 17.6916 22.9344 17.6901 23.51 17.1145Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="bg-white p-2 portfolio-card">
                                                    <img src="assets/img/freelancer/p-2.png" class="img-fluid w-100"
                                                        alt="" />
                                                    <div class="portfolio-card-overlay">
                                                        <a href="assets/img/freelancer/p-xl.jpeg"
                                                            class="portfolio-card-icon gallery">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="39"
                                                                height="39" viewBox="0 0 39 39" fill="none">
                                                                <path
                                                                    d="M37.2245 24.8216C36.4083 24.8216 35.7486 25.4813 35.7486 26.2975V33.1708L23.8381 21.2588C23.5503 20.971 23.1725 20.8264 22.7946 20.8264C22.4168 20.8264 22.039 20.971 21.7512 21.2588C21.1741 21.8359 21.1741 22.7686 21.7512 23.3457L33.6602 35.2562H26.7899C25.9737 35.2562 25.314 35.9159 25.314 36.7321C25.314 37.5483 25.9737 38.208 26.7899 38.208H37.2245C38.0406 38.208 38.7004 37.5483 38.7004 36.7321V26.2975C38.7004 25.4828 38.0406 24.8216 37.2245 24.8216Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M5.20277 2.95179H12.0745C12.8907 2.95179 13.5504 2.29207 13.5504 1.4759C13.5504 0.659726 12.8907 0 12.0745 0H1.63996C0.823788 0 0.164062 0.659726 0.164062 1.4759V11.9105C0.164062 12.7267 0.823788 13.3864 1.63996 13.3864C2.45613 13.3864 3.11586 12.7267 3.11586 11.9105V5.03871L15.1916 17.1145C15.7687 17.6916 16.7015 17.6916 17.2786 17.1145C17.8556 16.5374 17.8556 15.6047 17.2786 15.0276L5.20277 2.95179Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M15.9057 20.8264C15.5279 20.8264 15.1501 20.971 14.8623 21.2588L2.95179 33.1708V26.2975C2.95179 25.4813 2.29207 24.8216 1.4759 24.8216C0.659726 24.8216 0 25.4813 0 26.2975V36.7321C0 37.5483 0.659726 38.208 1.4759 38.208H11.9105C12.7267 38.208 13.3864 37.5483 13.3864 36.7321C13.3864 35.9159 12.7267 35.2562 11.9105 35.2562H5.04019L16.9492 23.3457C17.5263 22.7686 17.5263 21.8359 16.9492 21.2588C16.6614 20.971 16.2836 20.8264 15.9057 20.8264Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M23.51 17.1145L35.5857 5.03871V11.9105C35.5857 12.7267 36.2455 13.3864 37.0616 13.3864C37.8778 13.3864 38.5375 12.7267 38.5375 11.9105V1.4759C38.5375 0.659726 37.8778 0 37.0616 0H26.6271C25.8109 0 25.1512 0.659726 25.1512 1.4759C25.1512 2.29207 25.8109 2.95179 26.6271 2.95179H33.4988L21.423 15.0276C20.846 15.6047 20.846 16.5374 21.423 17.1145C22.0001 17.6916 22.9344 17.6901 23.51 17.1145Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="bg-white p-2 portfolio-card">
                                                    <img src="assets/img/freelancer/p-3.png" class="img-fluid w-100"
                                                        alt="" />
                                                    <div class="portfolio-card-overlay">
                                                        <a href="assets/img/freelancer/p-xl.jpeg"
                                                            class="portfolio-card-icon gallery">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="39"
                                                                height="39" viewBox="0 0 39 39" fill="none">
                                                                <path
                                                                    d="M37.2245 24.8216C36.4083 24.8216 35.7486 25.4813 35.7486 26.2975V33.1708L23.8381 21.2588C23.5503 20.971 23.1725 20.8264 22.7946 20.8264C22.4168 20.8264 22.039 20.971 21.7512 21.2588C21.1741 21.8359 21.1741 22.7686 21.7512 23.3457L33.6602 35.2562H26.7899C25.9737 35.2562 25.314 35.9159 25.314 36.7321C25.314 37.5483 25.9737 38.208 26.7899 38.208H37.2245C38.0406 38.208 38.7004 37.5483 38.7004 36.7321V26.2975C38.7004 25.4828 38.0406 24.8216 37.2245 24.8216Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M5.20277 2.95179H12.0745C12.8907 2.95179 13.5504 2.29207 13.5504 1.4759C13.5504 0.659726 12.8907 0 12.0745 0H1.63996C0.823788 0 0.164062 0.659726 0.164062 1.4759V11.9105C0.164062 12.7267 0.823788 13.3864 1.63996 13.3864C2.45613 13.3864 3.11586 12.7267 3.11586 11.9105V5.03871L15.1916 17.1145C15.7687 17.6916 16.7015 17.6916 17.2786 17.1145C17.8556 16.5374 17.8556 15.6047 17.2786 15.0276L5.20277 2.95179Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M15.9057 20.8264C15.5279 20.8264 15.1501 20.971 14.8623 21.2588L2.95179 33.1708V26.2975C2.95179 25.4813 2.29207 24.8216 1.4759 24.8216C0.659726 24.8216 0 25.4813 0 26.2975V36.7321C0 37.5483 0.659726 38.208 1.4759 38.208H11.9105C12.7267 38.208 13.3864 37.5483 13.3864 36.7321C13.3864 35.9159 12.7267 35.2562 11.9105 35.2562H5.04019L16.9492 23.3457C17.5263 22.7686 17.5263 21.8359 16.9492 21.2588C16.6614 20.971 16.2836 20.8264 15.9057 20.8264Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M23.51 17.1145L35.5857 5.03871V11.9105C35.5857 12.7267 36.2455 13.3864 37.0616 13.3864C37.8778 13.3864 38.5375 12.7267 38.5375 11.9105V1.4759C38.5375 0.659726 37.8778 0 37.0616 0H26.6271C25.8109 0 25.1512 0.659726 25.1512 1.4759C25.1512 2.29207 25.8109 2.95179 26.6271 2.95179H33.4988L21.423 15.0276C20.846 15.6047 20.846 16.5374 21.423 17.1145C22.0001 17.6916 22.9344 17.6901 23.51 17.1145Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="bg-white p-2 portfolio-card">
                                                    <img src="assets/img/freelancer/p-4.png" class="img-fluid w-100"
                                                        alt="" />
                                                    <div class="portfolio-card-overlay">
                                                        <a href="assets/img/freelancer/p-xl.jpeg"
                                                            class="portfolio-card-icon gallery">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="39"
                                                                height="39" viewBox="0 0 39 39" fill="none">
                                                                <path
                                                                    d="M37.2245 24.8216C36.4083 24.8216 35.7486 25.4813 35.7486 26.2975V33.1708L23.8381 21.2588C23.5503 20.971 23.1725 20.8264 22.7946 20.8264C22.4168 20.8264 22.039 20.971 21.7512 21.2588C21.1741 21.8359 21.1741 22.7686 21.7512 23.3457L33.6602 35.2562H26.7899C25.9737 35.2562 25.314 35.9159 25.314 36.7321C25.314 37.5483 25.9737 38.208 26.7899 38.208H37.2245C38.0406 38.208 38.7004 37.5483 38.7004 36.7321V26.2975C38.7004 25.4828 38.0406 24.8216 37.2245 24.8216Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M5.20277 2.95179H12.0745C12.8907 2.95179 13.5504 2.29207 13.5504 1.4759C13.5504 0.659726 12.8907 0 12.0745 0H1.63996C0.823788 0 0.164062 0.659726 0.164062 1.4759V11.9105C0.164062 12.7267 0.823788 13.3864 1.63996 13.3864C2.45613 13.3864 3.11586 12.7267 3.11586 11.9105V5.03871L15.1916 17.1145C15.7687 17.6916 16.7015 17.6916 17.2786 17.1145C17.8556 16.5374 17.8556 15.6047 17.2786 15.0276L5.20277 2.95179Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M15.9057 20.8264C15.5279 20.8264 15.1501 20.971 14.8623 21.2588L2.95179 33.1708V26.2975C2.95179 25.4813 2.29207 24.8216 1.4759 24.8216C0.659726 24.8216 0 25.4813 0 26.2975V36.7321C0 37.5483 0.659726 38.208 1.4759 38.208H11.9105C12.7267 38.208 13.3864 37.5483 13.3864 36.7321C13.3864 35.9159 12.7267 35.2562 11.9105 35.2562H5.04019L16.9492 23.3457C17.5263 22.7686 17.5263 21.8359 16.9492 21.2588C16.6614 20.971 16.2836 20.8264 15.9057 20.8264Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M23.51 17.1145L35.5857 5.03871V11.9105C35.5857 12.7267 36.2455 13.3864 37.0616 13.3864C37.8778 13.3864 38.5375 12.7267 38.5375 11.9105V1.4759C38.5375 0.659726 37.8778 0 37.0616 0H26.6271C25.8109 0 25.1512 0.659726 25.1512 1.4759C25.1512 2.29207 25.8109 2.95179 26.6271 2.95179H33.4988L21.423 15.0276C20.846 15.6047 20.846 16.5374 21.423 17.1145C22.0001 17.6916 22.9344 17.6901 23.51 17.1145Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="bg-white p-2 portfolio-card">
                                                    <img src="assets/img/freelancer/p-5.png" class="img-fluid w-100"
                                                        alt="" />
                                                    <div class="portfolio-card-overlay">
                                                        <a href="assets/img/freelancer/p-xl.jpeg"
                                                            class="portfolio-card-icon gallery">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="39"
                                                                height="39" viewBox="0 0 39 39" fill="none">
                                                                <path
                                                                    d="M37.2245 24.8216C36.4083 24.8216 35.7486 25.4813 35.7486 26.2975V33.1708L23.8381 21.2588C23.5503 20.971 23.1725 20.8264 22.7946 20.8264C22.4168 20.8264 22.039 20.971 21.7512 21.2588C21.1741 21.8359 21.1741 22.7686 21.7512 23.3457L33.6602 35.2562H26.7899C25.9737 35.2562 25.314 35.9159 25.314 36.7321C25.314 37.5483 25.9737 38.208 26.7899 38.208H37.2245C38.0406 38.208 38.7004 37.5483 38.7004 36.7321V26.2975C38.7004 25.4828 38.0406 24.8216 37.2245 24.8216Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M5.20277 2.95179H12.0745C12.8907 2.95179 13.5504 2.29207 13.5504 1.4759C13.5504 0.659726 12.8907 0 12.0745 0H1.63996C0.823788 0 0.164062 0.659726 0.164062 1.4759V11.9105C0.164062 12.7267 0.823788 13.3864 1.63996 13.3864C2.45613 13.3864 3.11586 12.7267 3.11586 11.9105V5.03871L15.1916 17.1145C15.7687 17.6916 16.7015 17.6916 17.2786 17.1145C17.8556 16.5374 17.8556 15.6047 17.2786 15.0276L5.20277 2.95179Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M15.9057 20.8264C15.5279 20.8264 15.1501 20.971 14.8623 21.2588L2.95179 33.1708V26.2975C2.95179 25.4813 2.29207 24.8216 1.4759 24.8216C0.659726 24.8216 0 25.4813 0 26.2975V36.7321C0 37.5483 0.659726 38.208 1.4759 38.208H11.9105C12.7267 38.208 13.3864 37.5483 13.3864 36.7321C13.3864 35.9159 12.7267 35.2562 11.9105 35.2562H5.04019L16.9492 23.3457C17.5263 22.7686 17.5263 21.8359 16.9492 21.2588C16.6614 20.971 16.2836 20.8264 15.9057 20.8264Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M23.51 17.1145L35.5857 5.03871V11.9105C35.5857 12.7267 36.2455 13.3864 37.0616 13.3864C37.8778 13.3864 38.5375 12.7267 38.5375 11.9105V1.4759C38.5375 0.659726 37.8778 0 37.0616 0H26.6271C25.8109 0 25.1512 0.659726 25.1512 1.4759C25.1512 2.29207 25.8109 2.95179 26.6271 2.95179H33.4988L21.423 15.0276C20.846 15.6047 20.846 16.5374 21.423 17.1145C22.0001 17.6916 22.9344 17.6901 23.51 17.1145Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="bg-white p-2 portfolio-card">
                                                    <img src="assets/img/freelancer/p-6.png" class="img-fluid w-100"
                                                        alt="" />
                                                    <div class="portfolio-card-overlay">
                                                        <a href="assets/img/freelancer/p-xl.jpeg"
                                                            class="portfolio-card-icon gallery">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="39"
                                                                height="39" viewBox="0 0 39 39" fill="none">
                                                                <path
                                                                    d="M37.2245 24.8216C36.4083 24.8216 35.7486 25.4813 35.7486 26.2975V33.1708L23.8381 21.2588C23.5503 20.971 23.1725 20.8264 22.7946 20.8264C22.4168 20.8264 22.039 20.971 21.7512 21.2588C21.1741 21.8359 21.1741 22.7686 21.7512 23.3457L33.6602 35.2562H26.7899C25.9737 35.2562 25.314 35.9159 25.314 36.7321C25.314 37.5483 25.9737 38.208 26.7899 38.208H37.2245C38.0406 38.208 38.7004 37.5483 38.7004 36.7321V26.2975C38.7004 25.4828 38.0406 24.8216 37.2245 24.8216Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M5.20277 2.95179H12.0745C12.8907 2.95179 13.5504 2.29207 13.5504 1.4759C13.5504 0.659726 12.8907 0 12.0745 0H1.63996C0.823788 0 0.164062 0.659726 0.164062 1.4759V11.9105C0.164062 12.7267 0.823788 13.3864 1.63996 13.3864C2.45613 13.3864 3.11586 12.7267 3.11586 11.9105V5.03871L15.1916 17.1145C15.7687 17.6916 16.7015 17.6916 17.2786 17.1145C17.8556 16.5374 17.8556 15.6047 17.2786 15.0276L5.20277 2.95179Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M15.9057 20.8264C15.5279 20.8264 15.1501 20.971 14.8623 21.2588L2.95179 33.1708V26.2975C2.95179 25.4813 2.29207 24.8216 1.4759 24.8216C0.659726 24.8216 0 25.4813 0 26.2975V36.7321C0 37.5483 0.659726 38.208 1.4759 38.208H11.9105C12.7267 38.208 13.3864 37.5483 13.3864 36.7321C13.3864 35.9159 12.7267 35.2562 11.9105 35.2562H5.04019L16.9492 23.3457C17.5263 22.7686 17.5263 21.8359 16.9492 21.2588C16.6614 20.971 16.2836 20.8264 15.9057 20.8264Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M23.51 17.1145L35.5857 5.03871V11.9105C35.5857 12.7267 36.2455 13.3864 37.0616 13.3864C37.8778 13.3864 38.5375 12.7267 38.5375 11.9105V1.4759C38.5375 0.659726 37.8778 0 37.0616 0H26.6271C25.8109 0 25.1512 0.659726 25.1512 1.4759C25.1512 2.29207 25.8109 2.95179 26.6271 2.95179H33.4988L21.423 15.0276C20.846 15.6047 20.846 16.5374 21.423 17.1145C22.0001 17.6916 22.9344 17.6901 23.51 17.1145Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="bg-white p-2 portfolio-card">
                                                    <img src="assets/img/freelancer/p-7.png" class="img-fluid w-100"
                                                        alt="" />
                                                    <div class="portfolio-card-overlay">
                                                        <a href="assets/img/freelancer/p-xl.jpeg"
                                                            class="portfolio-card-icon gallery">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="39"
                                                                height="39" viewBox="0 0 39 39" fill="none">
                                                                <path
                                                                    d="M37.2245 24.8216C36.4083 24.8216 35.7486 25.4813 35.7486 26.2975V33.1708L23.8381 21.2588C23.5503 20.971 23.1725 20.8264 22.7946 20.8264C22.4168 20.8264 22.039 20.971 21.7512 21.2588C21.1741 21.8359 21.1741 22.7686 21.7512 23.3457L33.6602 35.2562H26.7899C25.9737 35.2562 25.314 35.9159 25.314 36.7321C25.314 37.5483 25.9737 38.208 26.7899 38.208H37.2245C38.0406 38.208 38.7004 37.5483 38.7004 36.7321V26.2975C38.7004 25.4828 38.0406 24.8216 37.2245 24.8216Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M5.20277 2.95179H12.0745C12.8907 2.95179 13.5504 2.29207 13.5504 1.4759C13.5504 0.659726 12.8907 0 12.0745 0H1.63996C0.823788 0 0.164062 0.659726 0.164062 1.4759V11.9105C0.164062 12.7267 0.823788 13.3864 1.63996 13.3864C2.45613 13.3864 3.11586 12.7267 3.11586 11.9105V5.03871L15.1916 17.1145C15.7687 17.6916 16.7015 17.6916 17.2786 17.1145C17.8556 16.5374 17.8556 15.6047 17.2786 15.0276L5.20277 2.95179Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M15.9057 20.8264C15.5279 20.8264 15.1501 20.971 14.8623 21.2588L2.95179 33.1708V26.2975C2.95179 25.4813 2.29207 24.8216 1.4759 24.8216C0.659726 24.8216 0 25.4813 0 26.2975V36.7321C0 37.5483 0.659726 38.208 1.4759 38.208H11.9105C12.7267 38.208 13.3864 37.5483 13.3864 36.7321C13.3864 35.9159 12.7267 35.2562 11.9105 35.2562H5.04019L16.9492 23.3457C17.5263 22.7686 17.5263 21.8359 16.9492 21.2588C16.6614 20.971 16.2836 20.8264 15.9057 20.8264Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M23.51 17.1145L35.5857 5.03871V11.9105C35.5857 12.7267 36.2455 13.3864 37.0616 13.3864C37.8778 13.3864 38.5375 12.7267 38.5375 11.9105V1.4759C38.5375 0.659726 37.8778 0 37.0616 0H26.6271C25.8109 0 25.1512 0.659726 25.1512 1.4759C25.1512 2.29207 25.8109 2.95179 26.6271 2.95179H33.4988L21.423 15.0276C20.846 15.6047 20.846 16.5374 21.423 17.1145C22.0001 17.6916 22.9344 17.6901 23.51 17.1145Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="bg-white p-2 portfolio-card">
                                                    <img src="assets/img/freelancer/p-8.png" class="img-fluid w-100"
                                                        alt="" />
                                                    <div class="portfolio-card-overlay">
                                                        <a href="assets/img/freelancer/p-xl.jpeg"
                                                            class="portfolio-card-icon gallery">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="39"
                                                                height="39" viewBox="0 0 39 39" fill="none">
                                                                <path
                                                                    d="M37.2245 24.8216C36.4083 24.8216 35.7486 25.4813 35.7486 26.2975V33.1708L23.8381 21.2588C23.5503 20.971 23.1725 20.8264 22.7946 20.8264C22.4168 20.8264 22.039 20.971 21.7512 21.2588C21.1741 21.8359 21.1741 22.7686 21.7512 23.3457L33.6602 35.2562H26.7899C25.9737 35.2562 25.314 35.9159 25.314 36.7321C25.314 37.5483 25.9737 38.208 26.7899 38.208H37.2245C38.0406 38.208 38.7004 37.5483 38.7004 36.7321V26.2975C38.7004 25.4828 38.0406 24.8216 37.2245 24.8216Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M5.20277 2.95179H12.0745C12.8907 2.95179 13.5504 2.29207 13.5504 1.4759C13.5504 0.659726 12.8907 0 12.0745 0H1.63996C0.823788 0 0.164062 0.659726 0.164062 1.4759V11.9105C0.164062 12.7267 0.823788 13.3864 1.63996 13.3864C2.45613 13.3864 3.11586 12.7267 3.11586 11.9105V5.03871L15.1916 17.1145C15.7687 17.6916 16.7015 17.6916 17.2786 17.1145C17.8556 16.5374 17.8556 15.6047 17.2786 15.0276L5.20277 2.95179Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M15.9057 20.8264C15.5279 20.8264 15.1501 20.971 14.8623 21.2588L2.95179 33.1708V26.2975C2.95179 25.4813 2.29207 24.8216 1.4759 24.8216C0.659726 24.8216 0 25.4813 0 26.2975V36.7321C0 37.5483 0.659726 38.208 1.4759 38.208H11.9105C12.7267 38.208 13.3864 37.5483 13.3864 36.7321C13.3864 35.9159 12.7267 35.2562 11.9105 35.2562H5.04019L16.9492 23.3457C17.5263 22.7686 17.5263 21.8359 16.9492 21.2588C16.6614 20.971 16.2836 20.8264 15.9057 20.8264Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M23.51 17.1145L35.5857 5.03871V11.9105C35.5857 12.7267 36.2455 13.3864 37.0616 13.3864C37.8778 13.3864 38.5375 12.7267 38.5375 11.9105V1.4759C38.5375 0.659726 37.8778 0 37.0616 0H26.6271C25.8109 0 25.1512 0.659726 25.1512 1.4759C25.1512 2.29207 25.8109 2.95179 26.6271 2.95179H33.4988L21.423 15.0276C20.846 15.6047 20.846 16.5374 21.423 17.1145C22.0001 17.6916 22.9344 17.6901 23.51 17.1145Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="bg-white p-2 portfolio-card">
                                                    <img src="assets/img/freelancer/p-9.png" class="img-fluid w-100"
                                                        alt="" />
                                                    <div class="portfolio-card-overlay">
                                                        <a href="assets/img/freelancer/p-xl.jpeg"
                                                            class="portfolio-card-icon gallery">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="39"
                                                                height="39" viewBox="0 0 39 39" fill="none">
                                                                <path
                                                                    d="M37.2245 24.8216C36.4083 24.8216 35.7486 25.4813 35.7486 26.2975V33.1708L23.8381 21.2588C23.5503 20.971 23.1725 20.8264 22.7946 20.8264C22.4168 20.8264 22.039 20.971 21.7512 21.2588C21.1741 21.8359 21.1741 22.7686 21.7512 23.3457L33.6602 35.2562H26.7899C25.9737 35.2562 25.314 35.9159 25.314 36.7321C25.314 37.5483 25.9737 38.208 26.7899 38.208H37.2245C38.0406 38.208 38.7004 37.5483 38.7004 36.7321V26.2975C38.7004 25.4828 38.0406 24.8216 37.2245 24.8216Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M5.20277 2.95179H12.0745C12.8907 2.95179 13.5504 2.29207 13.5504 1.4759C13.5504 0.659726 12.8907 0 12.0745 0H1.63996C0.823788 0 0.164062 0.659726 0.164062 1.4759V11.9105C0.164062 12.7267 0.823788 13.3864 1.63996 13.3864C2.45613 13.3864 3.11586 12.7267 3.11586 11.9105V5.03871L15.1916 17.1145C15.7687 17.6916 16.7015 17.6916 17.2786 17.1145C17.8556 16.5374 17.8556 15.6047 17.2786 15.0276L5.20277 2.95179Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M15.9057 20.8264C15.5279 20.8264 15.1501 20.971 14.8623 21.2588L2.95179 33.1708V26.2975C2.95179 25.4813 2.29207 24.8216 1.4759 24.8216C0.659726 24.8216 0 25.4813 0 26.2975V36.7321C0 37.5483 0.659726 38.208 1.4759 38.208H11.9105C12.7267 38.208 13.3864 37.5483 13.3864 36.7321C13.3864 35.9159 12.7267 35.2562 11.9105 35.2562H5.04019L16.9492 23.3457C17.5263 22.7686 17.5263 21.8359 16.9492 21.2588C16.6614 20.971 16.2836 20.8264 15.9057 20.8264Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M23.51 17.1145L35.5857 5.03871V11.9105C35.5857 12.7267 36.2455 13.3864 37.0616 13.3864C37.8778 13.3864 38.5375 12.7267 38.5375 11.9105V1.4759C38.5375 0.659726 37.8778 0 37.0616 0H26.6271C25.8109 0 25.1512 0.659726 25.1512 1.4759C25.1512 2.29207 25.8109 2.95179 26.6271 2.95179H33.4988L21.423 15.0276C20.846 15.6047 20.846 16.5374 21.423 17.1145C22.0001 17.6916 22.9344 17.6901 23.51 17.1145Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="bg-white p-2 portfolio-card">
                                                    <img src="assets/img/freelancer/p-10.png" class="img-fluid w-100"
                                                        alt="" />
                                                    <div class="portfolio-card-overlay">
                                                        <a href="assets/img/freelancer/p-xl.jpeg"
                                                            class="portfolio-card-icon gallery">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="39"
                                                                height="39" viewBox="0 0 39 39" fill="none">
                                                                <path
                                                                    d="M37.2245 24.8216C36.4083 24.8216 35.7486 25.4813 35.7486 26.2975V33.1708L23.8381 21.2588C23.5503 20.971 23.1725 20.8264 22.7946 20.8264C22.4168 20.8264 22.039 20.971 21.7512 21.2588C21.1741 21.8359 21.1741 22.7686 21.7512 23.3457L33.6602 35.2562H26.7899C25.9737 35.2562 25.314 35.9159 25.314 36.7321C25.314 37.5483 25.9737 38.208 26.7899 38.208H37.2245C38.0406 38.208 38.7004 37.5483 38.7004 36.7321V26.2975C38.7004 25.4828 38.0406 24.8216 37.2245 24.8216Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M5.20277 2.95179H12.0745C12.8907 2.95179 13.5504 2.29207 13.5504 1.4759C13.5504 0.659726 12.8907 0 12.0745 0H1.63996C0.823788 0 0.164062 0.659726 0.164062 1.4759V11.9105C0.164062 12.7267 0.823788 13.3864 1.63996 13.3864C2.45613 13.3864 3.11586 12.7267 3.11586 11.9105V5.03871L15.1916 17.1145C15.7687 17.6916 16.7015 17.6916 17.2786 17.1145C17.8556 16.5374 17.8556 15.6047 17.2786 15.0276L5.20277 2.95179Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M15.9057 20.8264C15.5279 20.8264 15.1501 20.971 14.8623 21.2588L2.95179 33.1708V26.2975C2.95179 25.4813 2.29207 24.8216 1.4759 24.8216C0.659726 24.8216 0 25.4813 0 26.2975V36.7321C0 37.5483 0.659726 38.208 1.4759 38.208H11.9105C12.7267 38.208 13.3864 37.5483 13.3864 36.7321C13.3864 35.9159 12.7267 35.2562 11.9105 35.2562H5.04019L16.9492 23.3457C17.5263 22.7686 17.5263 21.8359 16.9492 21.2588C16.6614 20.971 16.2836 20.8264 15.9057 20.8264Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M23.51 17.1145L35.5857 5.03871V11.9105C35.5857 12.7267 36.2455 13.3864 37.0616 13.3864C37.8778 13.3864 38.5375 12.7267 38.5375 11.9105V1.4759C38.5375 0.659726 37.8778 0 37.0616 0H26.6271C25.8109 0 25.1512 0.659726 25.1512 1.4759C25.1512 2.29207 25.8109 2.95179 26.6271 2.95179H33.4988L21.423 15.0276C20.846 15.6047 20.846 16.5374 21.423 17.1145C22.0001 17.6916 22.9344 17.6901 23.51 17.1145Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="bg-white p-2 portfolio-card">
                                                    <img src="assets/img/freelancer/p-11.png" class="img-fluid w-100"
                                                        alt="" />
                                                    <div class="portfolio-card-overlay">
                                                        <a href="assets/img/freelancer/p-xl.jpeg"
                                                            class="portfolio-card-icon gallery">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="39"
                                                                height="39" viewBox="0 0 39 39" fill="none">
                                                                <path
                                                                    d="M37.2245 24.8216C36.4083 24.8216 35.7486 25.4813 35.7486 26.2975V33.1708L23.8381 21.2588C23.5503 20.971 23.1725 20.8264 22.7946 20.8264C22.4168 20.8264 22.039 20.971 21.7512 21.2588C21.1741 21.8359 21.1741 22.7686 21.7512 23.3457L33.6602 35.2562H26.7899C25.9737 35.2562 25.314 35.9159 25.314 36.7321C25.314 37.5483 25.9737 38.208 26.7899 38.208H37.2245C38.0406 38.208 38.7004 37.5483 38.7004 36.7321V26.2975C38.7004 25.4828 38.0406 24.8216 37.2245 24.8216Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M5.20277 2.95179H12.0745C12.8907 2.95179 13.5504 2.29207 13.5504 1.4759C13.5504 0.659726 12.8907 0 12.0745 0H1.63996C0.823788 0 0.164062 0.659726 0.164062 1.4759V11.9105C0.164062 12.7267 0.823788 13.3864 1.63996 13.3864C2.45613 13.3864 3.11586 12.7267 3.11586 11.9105V5.03871L15.1916 17.1145C15.7687 17.6916 16.7015 17.6916 17.2786 17.1145C17.8556 16.5374 17.8556 15.6047 17.2786 15.0276L5.20277 2.95179Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M15.9057 20.8264C15.5279 20.8264 15.1501 20.971 14.8623 21.2588L2.95179 33.1708V26.2975C2.95179 25.4813 2.29207 24.8216 1.4759 24.8216C0.659726 24.8216 0 25.4813 0 26.2975V36.7321C0 37.5483 0.659726 38.208 1.4759 38.208H11.9105C12.7267 38.208 13.3864 37.5483 13.3864 36.7321C13.3864 35.9159 12.7267 35.2562 11.9105 35.2562H5.04019L16.9492 23.3457C17.5263 22.7686 17.5263 21.8359 16.9492 21.2588C16.6614 20.971 16.2836 20.8264 15.9057 20.8264Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M23.51 17.1145L35.5857 5.03871V11.9105C35.5857 12.7267 36.2455 13.3864 37.0616 13.3864C37.8778 13.3864 38.5375 12.7267 38.5375 11.9105V1.4759C38.5375 0.659726 37.8778 0 37.0616 0H26.6271C25.8109 0 25.1512 0.659726 25.1512 1.4759C25.1512 2.29207 25.8109 2.95179 26.6271 2.95179H33.4988L21.423 15.0276C20.846 15.6047 20.846 16.5374 21.423 17.1145C22.0001 17.6916 22.9344 17.6901 23.51 17.1145Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-xl-4 col-md-6">
                                                <div class="bg-white p-2 portfolio-card">
                                                    <img src="assets/img/freelancer/p-12.png" class="img-fluid w-100"
                                                        alt="" />
                                                    <div class="portfolio-card-overlay">
                                                        <a href="assets/img/freelancer/p-xl.jpeg"
                                                            class="portfolio-card-icon gallery">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="39"
                                                                height="39" viewBox="0 0 39 39" fill="none">
                                                                <path
                                                                    d="M37.2245 24.8216C36.4083 24.8216 35.7486 25.4813 35.7486 26.2975V33.1708L23.8381 21.2588C23.5503 20.971 23.1725 20.8264 22.7946 20.8264C22.4168 20.8264 22.039 20.971 21.7512 21.2588C21.1741 21.8359 21.1741 22.7686 21.7512 23.3457L33.6602 35.2562H26.7899C25.9737 35.2562 25.314 35.9159 25.314 36.7321C25.314 37.5483 25.9737 38.208 26.7899 38.208H37.2245C38.0406 38.208 38.7004 37.5483 38.7004 36.7321V26.2975C38.7004 25.4828 38.0406 24.8216 37.2245 24.8216Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M5.20277 2.95179H12.0745C12.8907 2.95179 13.5504 2.29207 13.5504 1.4759C13.5504 0.659726 12.8907 0 12.0745 0H1.63996C0.823788 0 0.164062 0.659726 0.164062 1.4759V11.9105C0.164062 12.7267 0.823788 13.3864 1.63996 13.3864C2.45613 13.3864 3.11586 12.7267 3.11586 11.9105V5.03871L15.1916 17.1145C15.7687 17.6916 16.7015 17.6916 17.2786 17.1145C17.8556 16.5374 17.8556 15.6047 17.2786 15.0276L5.20277 2.95179Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M15.9057 20.8264C15.5279 20.8264 15.1501 20.971 14.8623 21.2588L2.95179 33.1708V26.2975C2.95179 25.4813 2.29207 24.8216 1.4759 24.8216C0.659726 24.8216 0 25.4813 0 26.2975V36.7321C0 37.5483 0.659726 38.208 1.4759 38.208H11.9105C12.7267 38.208 13.3864 37.5483 13.3864 36.7321C13.3864 35.9159 12.7267 35.2562 11.9105 35.2562H5.04019L16.9492 23.3457C17.5263 22.7686 17.5263 21.8359 16.9492 21.2588C16.6614 20.971 16.2836 20.8264 15.9057 20.8264Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M23.51 17.1145L35.5857 5.03871V11.9105C35.5857 12.7267 36.2455 13.3864 37.0616 13.3864C37.8778 13.3864 38.5375 12.7267 38.5375 11.9105V1.4759C38.5375 0.659726 37.8778 0 37.0616 0H26.6271C25.8109 0 25.1512 0.659726 25.1512 1.4759C25.1512 2.29207 25.8109 2.95179 26.6271 2.95179H33.4988L21.423 15.0276C20.846 15.6047 20.846 16.5374 21.423 17.1145C22.0001 17.6916 22.9344 17.6901 23.51 17.1145Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="d-flex justify-content-center mt-5">
                                            <a href="#" class="w-btn-primary-lg">
                                                See More Works
                                                <svg width="14" height="10" viewBox="0 0 14 10"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Freelancer Details End -->
    </main>
    <!-- Main End -->
@endsection
