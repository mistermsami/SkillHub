@extends('buyer.layout.buyerlayout')

{{-- PageTitle --}}
@section('pagetitle')
    Profile Settings
@endsection


{{-- Main Content --}}
@section('maincontent')
    <div class="d-xl-flex">

        <!-- Right -->
        <div class="flex-grow-1 align-items-center">

            <!-- Main -->
            <main class="dashboard-main min-vh-100">
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
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
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
                                <form action="{{ route('buyerprofileupdate') }}" method="POST"
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
                                                                value="{{ $buyerdetails->user->firstname }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-container">
                                                            <label for="lname" class="form-label">Last Name
                                                                <span class="text-lime-300">*</span></label>
                                                            <input type="text" class="form-control shadow-none"
                                                                placeholder="Musa" name="lastname"
                                                                value="{{ $buyerdetails->user->lastname }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-container">
                                                            <label for="lname" class="form-label">Username
                                                                <span class="text-lime-300">*</span></label>
                                                            <input type="text" class="form-control shadow-none"
                                                                placeholder="Musa" name="username"
                                                                value="{{ $buyerdetails->user->username }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-container">
                                                            <label for="email" class="form-label">
                                                                Email Address
                                                                <span class="text-lime-300">*</span></label>
                                                            <input type="text" class="form-control shadow-none"
                                                                placeholder="example@email.com" name="email"
                                                                value="{{ $buyerdetails->user->email }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="description" class="form-label">Description
                                                            <span class="text-lime-300">*</span></label>
                                                        <textarea type="text" class="form-control shadow-none" name="description" id="" rows="5">{{ $buyerdetails->FB_about }}</textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-container">
                                                            <label for="category" class="form-label">Country
                                                                <span class="text-lime-300">*</span></label>
                                                            <input type="text" class="form-control shadow-none"
                                                                name="country" id=""
                                                                value="{{ $buyerdetails->user->country }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-container">
                                                            <label for="category" class="form-label">Town/City
                                                                <span class="text-lime-300">*</span></label>
                                                            <input type="text" class="form-control shadow-none"
                                                                name="city" id=""
                                                                value="{{ $buyerdetails->user->city }}">
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
                                                                value="{{ $buyerdetails->user->language }}" />
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
                                                @if ($buyerdetails->user->profileimage)
                                                    <div class="mt-2 mb-2">
                                                        <img src="{{ asset('profile_images/' . $buyerdetails->user->profileimage) }}"
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
    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex flex-column align-items-center rounded-3 p-5 mx-auto">
                        <span class="mb-30">
                            <svg xmlns="http://www.w3.org/2000/svg" width="136" height="136" viewBox="0 0 136 136"
                                fill="none">
                                <circle cx="68" cy="68" r="68" fill="#FF3838" />
                                <path
                                    d="M69.8829 35.7891C71.1574 36.0357 72.4554 36.1967 73.7029 36.5423C81.5433 38.7098 87.2691 45.5378 87.956 53.6156C88.5098 60.1147 86.3061 65.6006 81.5029 70.0195C79.8344 71.5545 78.0482 72.9604 76.3394 74.4534C76.1256 74.6397 75.9639 75.0037 75.9589 75.2872C75.9269 77.2752 75.9421 79.2649 75.9421 81.2965C70.888 81.2965 65.8743 81.2965 60.79 81.2965C60.79 81.0616 60.79 80.8385 60.79 80.6137C60.79 76.5454 60.7984 72.4772 60.7782 68.4106C60.7765 67.9392 60.9297 67.649 61.2816 67.3537C64.5628 64.5957 67.8256 61.8175 71.1018 59.0545C72.2601 58.0781 72.9201 56.8702 72.9066 55.3419C72.8864 52.916 70.8594 50.9146 68.4216 50.8911C65.9686 50.8693 63.913 52.8053 63.8305 55.2328C63.8069 55.8988 63.8271 56.5665 63.8271 57.2695C58.7731 57.2695 53.7729 57.2695 48.6902 57.2695C48.6902 56.3149 48.6448 55.3385 48.697 54.3655C49.2205 44.699 56.7427 36.8745 66.4316 35.8914C66.5747 35.8763 66.7128 35.8243 66.8525 35.7891C67.8626 35.7891 68.8728 35.7891 69.8829 35.7891Z"
                                    fill="white" />
                                <path
                                    d="M67.485 100.209C66.1617 99.9258 64.9041 99.5081 63.803 98.6777C61.3804 96.8474 60.2877 93.7689 61.0386 90.7878C61.7726 87.8737 64.2138 85.6693 67.2089 85.2147C71.273 84.599 75.2024 87.3671 75.8135 91.276C76.4937 95.6143 73.8202 99.3773 69.544 100.102C69.4429 100.119 69.3487 100.171 69.2527 100.208C68.6635 100.209 68.0742 100.209 67.485 100.209Z"
                                    fill="white" />
                            </svg>
                        </span>
                        <h4 class="text-18 fw-normal text-center mb-2">
                            Are you sure you want to Logout
                        </h4>
                        <p class="text-dark-300">Workzone.</p>
                        <div class="d-flex gap-3 mt-30">
                            <button class="w-btn-secondary-lg" data-bs-dismiss="modal" aria-label="Close">
                                Yes Logout
                            </button>
                            <button class="text-decoration-underline text-danger" data-bs-dismiss="modal"
                                aria-label="Close">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
