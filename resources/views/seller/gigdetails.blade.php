@extends('layout.layout')

{{-- PageTitle --}}
@section('pagetitle')
    Gig Details
@endsection


{{-- Main Content --}}
@section('maincontent')
    <main>
        <!-- Breadcrumb -->
        <section class="w-breadcrumb-area"
            style="background: url({{ asset('assets/img/common/breadcrumb-bg.png') }}) no-repeat
            center center/cover;">
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="position-relative z-2" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="linear">
                            <h2 class="section-title-light mb-2">Gig Details</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb w-breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Gig Details
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
                                            <img src="{{$gig->G_image ? asset('gig_images/' . $gig->G_image) : asset('assets/img/blur.jpg') }}"class="img-fluid w-100" />
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
                                    {{ $gig->G_title }}
                                </h2>
                                <h3 class="service-details-subtitle fw-bold mb-3">
                                    Gig Description
                                </h3>
                                <p class="text-dark-200 mb-4">
                                    {{ $gig->G_description }}
                                </p>


                            </div>
                        </div>


                    </div>
                    <!-- Right -->
                    <div class="col-xl-3 mt-30 mt-xl-0">
                        <aside class="d-flex flex-column gap-4">
                            <div>
                            </div>
                            <!-- Card -->
                            <div class="freelancer-sidebar-card p-4 rounded-4 bg-white position-relative">
                                <div class="job-type-badge position-absolute d-flex flex-column gap-2">
                                    <p class="job-type-badge-tertiary p-2">Author</p>
                                    <p class="job-type-badge-secondary p-2">Top Sepper</p>
                                </div>
                                <div
                                    class="freelancer-sidebar-card-header d-flex flex-column justify-content-center align-items-center py-4">
                                    <img src="{{ asset('profile_images/' . $gig->freelanceSeller->user->profileimage) }}"
                                        class="freelancer-avatar rounded-circle mb-4" alt="" />
                                    <h3 class="fw-bold freelancer-name text-dark-300 mb-2">
                                        {{ $gig->freelanceSeller->user->firstname }}&nbsp;{{ $gig->freelanceSeller->user->lastname }}
                                    </h3>
                                    <p class="text-dark-200 mb-1">{{ $gig->freelanceSeller->FS_role }}</p>
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
                                <div class="d-flex gap-4 justify-content-between sidebar-rate-card p-4">
                                    <div>
                                        <p class="text-dark-300">Location</p>
                                        <p class="text-dark-200">{{$gig->freelanceSeller->user->city}}, {{$gig->freelanceSeller->user->country}}</p>
                                    </div>
                                     <div>
                                        <p class="text-dark-300">Rate</p>
                                        <p class="text-dark-200">${{$gig->freelanceSeller->FS_hourlyrate}}/hr</p>
                                    </div>
                                    {{-- <div>
                                        <p class="text-dark-300">Jobs</p>
                                        <p class="text-dark-200">560</p>
                                    </div> --}}
                                </div>
                                <div class="d-grid">
                                    <a href="{{asset('freelancerdetails/'.$gig->freelanceSeller->FS_id)}}" class="w-btn-black-lg w-100">
                                        View Profile
                                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Details End -->
    </main>
@endsection
