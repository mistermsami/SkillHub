@extends('seller.layout.sellerlayout')

{{-- PageTitle --}}
@section('pagetitle')
    My Proposals
@endsection


{{-- Main Content --}}
@section('maincontent')
    <!-- Mobile End -->
    <div class="flex-grow-1 align-items-center">

        <!-- Main -->
        <main class="dashboard-main min-vh-100">
            <div class="d-flex flex-column gap-4">
                <div class="d-flex flex-column flex-md-row gap-4 align-items-md-center justify-content-between">
                    <div>
                        <h3 class="text-24 fw-bold text-dark-300 mb-2">My Proposals</h3>
                        <ul class="d-flex align-items-center gap-2">
                            <li class="text-dark-200 fs-6">Dashboard</li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="5" height="11" viewBox="0 0 5 11"
                                    fill="none">
                                    <path d="M1 10L4 5.5L1 1" stroke="#5B5B5B" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </li>
                            <li class="text-lime-300 fs-6">My Proposals</li>
                        </ul>
                    </div>
                </div>
                <!-- Content -->
                <div>
                    <!-- Tab Nav -->
                    <nav>
                        <div class="d-flex flex-wrap gap-3 align-items-center" id="nav-tab" role="tablist">
                            <button class="dashboard-tab-btn active" id="nav-all-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all"
                                aria-selected="true">
                                All({{ $allproposals }})
                            </button>
                            <button class="dashboard-tab-btn" id="nav-active-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-active" type="button" role="tab" aria-controls="nav-active"
                                aria-selected="false">
                                Active({{ $openproposals }})
                            </button>
                            <button class="dashboard-tab-btn" id="nav-close-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-close" type="button" role="tab" aria-controls="nav-close"
                                aria-selected="false">
                                Declined({{ $declineproposals }})
                            </button>
                        </div>
                    </nav>
                    <!-- Tab Content -->
                    <div class="tab-content mt-4" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab"
                            tabindex="0">
                            <!-- All -->
                            <div>
                                <div class="overflow-x-auto">
                                    <div class="w-100">
                                        <table class="w-100 dashboard-table">
                                            <thead class="pb-3">
                                                <tr>
                                                    <th scope="col" class="ps-4">Proposal</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($proposals as $proposaldetail)
                                                    {{-- @if ($proposaldetail->proposals->G_id) --}}
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex gap-3 align-items-center project-name">
                                                                <div class="order-img">
                                                                    <img src="{{ asset('gig_images/' . $proposaldetail->gig->G_image) }}"
                                                                        alt="" />
                                                                </div>
                                                                <div>
                                                                    <a href="#"
                                                                        class="text-dark-200 project-link">
                                                                        {{ Str::limit($proposaldetail->P_coverletter, 50) }}
                                                                    </a>

                                                                    {{-- <ul class="d-flex gap-1 order-category">
                                                                    <li class="text-dark-200">WordPress</li>
                                                                    <li class="text-dark-200">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="5" height="10" viewBox="0 0 5 10"
                                                                            fill="none">
                                                                            <path d="M1 9L4 5L1 1" stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </svg>
                                                                    </li>
                                                                    <li class="text-dark-200">Creative</li>
                                                                </ul> --}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-dark-200">$ {{ $proposaldetail->job->J_budget }}
                                                        </td>
                                                        <td>
                                                            <span class="status-badge pending">
                                                                {{ $proposaldetail->P_status }}
                                                            </span>
                                                        </td>
                                                        <td class="text-dark-200">
                                                            {{ $proposaldetail->created_at->format('F j, Y') }}
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-center gap-2">
                                                                {{-- <a href="seller-message.html" class="dashboard-action-btn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                    height="48" viewBox="0 0 48 48" fill="none">
                                                                    <circle cx="24" cy="24" r="24"
                                                                        fill="#EDEBE7" />
                                                                    <path
                                                                        d="M18 20L21.7812 22.5208C23.1248 23.4165 24.8752 23.4165 26.2188 22.5208L30 20M18 33H30C32.2091 33 34 31.2091 34 29V19C34 16.7909 32.2091 15 30 15H18C15.7909 15 14 16.7909 14 19V29C14 31.2091 15.7909 33 18 33Z"
                                                                        stroke="#5B5B5B" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </a> --}}
                                                                <button class="dashboard-action-btn" data-bs-toggle="modal"
                                                                    data-bs-target="#orderDetails{{ $proposaldetail->P_id }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                        height="48" viewBox="0 0 48 48" fill="none">
                                                                        <circle cx="24" cy="24" r="24"
                                                                            fill="#EDEBE7" />
                                                                        <path
                                                                            d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                            stroke="#5B5B5B" stroke-width="1.5" />
                                                                        <circle cx="23.667" cy="24.167" r="3.5"
                                                                            stroke="#5B5B5B" stroke-width="1.5" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    {{-- @endif --}}
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Active -->
                        <div class="tab-pane fade" id="nav-active" role="tabpanel" aria-labelledby="nav-active-tab"
                            tabindex="0">
                            <div>
                                <div class="overflow-x-auto">
                                    <div class="w-100">
                                        <table class="w-100 dashboard-table">
                                            <thead class="pb-3">
                                                <tr>
                                                    <th scope="col" class="ps-4">Proposal</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($proposals as $proposaldetail)
                                                    @if ($proposaldetail->P_status == 'open')
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex gap-3 align-items-center project-name">
                                                                    <div class="order-img">
                                                                        <img src="{{ asset('gig_images/' . $proposaldetail->gig->G_image) }}"
                                                                            alt="" />
                                                                    </div>
                                                                    <div>
                                                                        <a href="#"
                                                                            class="text-dark-200 project-link">
                                                                            {{ Str::limit($proposaldetail->P_coverletter, 50) }}
                                                                        </a>

                                                                        {{-- <ul class="d-flex gap-1 order-category">
                                                                    <li class="text-dark-200">WordPress</li>
                                                                    <li class="text-dark-200">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="5" height="10" viewBox="0 0 5 10"
                                                                            fill="none">
                                                                            <path d="M1 9L4 5L1 1" stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </svg>
                                                                    </li>
                                                                    <li class="text-dark-200">Creative</li>
                                                                </ul> --}}
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-dark-200">$
                                                                {{ $proposaldetail->job->J_budget }}
                                                            </td>
                                                            <td>
                                                                <span class="status-badge pending">
                                                                    {{ $proposaldetail->P_status }}
                                                                </span>
                                                            </td>
                                                            <td class="text-dark-200">
                                                                {{ $proposaldetail->created_at->format('F j, Y') }}
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-center gap-2">
                                                                    {{-- <a href="seller-message.html" class="dashboard-action-btn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                    height="48" viewBox="0 0 48 48" fill="none">
                                                                    <circle cx="24" cy="24" r="24"
                                                                        fill="#EDEBE7" />
                                                                    <path
                                                                        d="M18 20L21.7812 22.5208C23.1248 23.4165 24.8752 23.4165 26.2188 22.5208L30 20M18 33H30C32.2091 33 34 31.2091 34 29V19C34 16.7909 32.2091 15 30 15H18C15.7909 15 14 16.7909 14 19V29C14 31.2091 15.7909 33 18 33Z"
                                                                        stroke="#5B5B5B" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </a> --}}
                                                                    <button class="dashboard-action-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#orderDetails{{ $proposaldetail->P_id }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="48" height="48"
                                                                            viewBox="0 0 48 48" fill="none">
                                                                            <circle cx="24" cy="24" r="24"
                                                                                fill="#EDEBE7" />
                                                                            <path
                                                                                d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                                stroke="#5B5B5B" stroke-width="1.5" />
                                                                            <circle cx="23.667" cy="24.167" r="3.5"
                                                                                stroke="#5B5B5B" stroke-width="1.5" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Close -->
                        <div class="tab-pane fade" id="nav-close" role="tabpanel" aria-labelledby="nav-close-tab"
                            tabindex="0">
                            <div>
                                <div class="overflow-x-auto">
                                    <div class="w-100">
                                        <table class="w-100 dashboard-table">
                                            <thead class="pb-3">
                                                <tr>
                                                    <th scope="col" class="ps-4">Proposal</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($proposals as $proposaldetail)
                                                    @if ($proposaldetail->P_status == 'decline')
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex gap-3 align-items-center project-name">
                                                                    <div class="order-img">
                                                                        <img src="{{ asset('gig_images/' . $proposaldetail->gig->G_image) }}"
                                                                            alt="" />
                                                                    </div>
                                                                    <div>
                                                                        <a href="#"
                                                                            class="text-dark-200 project-link">
                                                                            {{ Str::limit($proposaldetail->P_coverletter, 50) }}
                                                                        </a>

                                                                        {{-- <ul class="d-flex gap-1 order-category">
                                                                    <li class="text-dark-200">WordPress</li>
                                                                    <li class="text-dark-200">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="5" height="10" viewBox="0 0 5 10"
                                                                            fill="none">
                                                                            <path d="M1 9L4 5L1 1" stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </svg>
                                                                    </li>
                                                                    <li class="text-dark-200">Creative</li>
                                                                </ul> --}}
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-dark-200">$
                                                                {{ $proposaldetail->job->J_budget }}
                                                            </td>
                                                            <td>
                                                                <span class="status-badge pending">
                                                                    {{ $proposaldetail->P_status }}
                                                                </span>
                                                            </td>
                                                            <td class="text-dark-200">
                                                                {{ $proposaldetail->created_at->format('F j, Y') }}
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-center gap-2">
                                                                    {{-- <a href="seller-message.html" class="dashboard-action-btn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                    height="48" viewBox="0 0 48 48" fill="none">
                                                                    <circle cx="24" cy="24" r="24"
                                                                        fill="#EDEBE7" />
                                                                    <path
                                                                        d="M18 20L21.7812 22.5208C23.1248 23.4165 24.8752 23.4165 26.2188 22.5208L30 20M18 33H30C32.2091 33 34 31.2091 34 29V19C34 16.7909 32.2091 15 30 15H18C15.7909 15 14 16.7909 14 19V29C14 31.2091 15.7909 33 18 33Z"
                                                                        stroke="#5B5B5B" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </a> --}}
                                                                    <button class="dashboard-action-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#orderDetails{{ $proposaldetail->P_id }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="48" height="48"
                                                                            viewBox="0 0 48 48" fill="none">
                                                                            <circle cx="24" cy="24" r="24"
                                                                                fill="#EDEBE7" />
                                                                            <path
                                                                                d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                                stroke="#5B5B5B" stroke-width="1.5" />
                                                                            <circle cx="23.667" cy="24.167" r="3.5"
                                                                                stroke="#5B5B5B" stroke-width="1.5" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>

    <!-- Details -->
    @foreach ($proposals as $proposaldetail)
        <div class="modal fade" id="orderDetails{{ $proposaldetail->P_id }}" tabindex="-1"
            aria-labelledby="exampleOrderDetails" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="bg-white rounded-3 p-lg-5">
                            <div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
                                <h4>Proposal Details</h4>
                                <button data-bs-dismiss="modal" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 32 32" fill="none">
                                        <circle cx="16" cy="16" r="16" fill="#FF3838" />
                                        <path d="M22.2188 9.77734L8.88614 23.1107" stroke="white" stroke-width="1.8"
                                            stroke-linecap="round" />
                                        <path d="M22.2188 23.1094L8.88614 9.77605" stroke="white" stroke-width="1.8"
                                            stroke-linecap="round" />
                                    </svg>
                                </button>
                            </div>
                            <div class="pt-4">
                                <div class="row g-4">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="bg-offWhite p-4 rounded-4">
                                            <div class="d-flex flex-column flex-md-row gap-3 justify-content-between">
                                                <div class="d-flex gap-3 align-items-center">
                                                    <div class="order-img">
                                                        <img src="{{ asset('gig_images/' . $proposaldetail->gig->G_image) }}"
                                                            alt=""
                                                            style="height: 60px; width: 60px; border-radius: 8px;" />
                                                    </div>
                                                    <div>
                                                        <p class="text-dark-200">
                                                            <b>GIG: <br></b> {{ $proposaldetail->gig->G_title }}
                                                        </p>
                                                        {{-- <ul class="d-flex gap-1 order-category">
                                                        <li class="text-dark-200">WordPress</li>
                                                        <li class="text-dark-200">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="5"
                                                                height="10" viewBox="0 0 5 10" fill="none">
                                                                <path d="M1 9L4 5L1 1" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </li>
                                                        <li class="text-dark-200">Creative</li>
                                                    </ul> --}}
                                                    </div>
                                                </div>
                                                {{-- <div>
                                                <p class="text-lime-300">#888654</p>
                                                <p class="text-14 text-dark-200">3 Hours 5 min ago</p>
                                            </div> --}}
                                            </div>
                                            <div class="bg-white p-3 rounded-3 mt-4">
                                                <p class="text-dark-200">
                                                    <b>JOB: <br> </b> {{ $proposaldetail->Job->J_description }}
                                                </p>
                                                <div class="bg-offWhite p-3 rounded-3 mt-4">
                                                    <p class="text-dark-200">
                                                        <b>COVERLETTER: <br> </b> {{ $proposaldetail->P_coverletter }}
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Work Submit -->
    <div class="modal fade" id="workSubmit" tabindex="-1" aria-labelledby="exampleWorkSubmit" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="bg-white rounded-3 p-lg-5">
                        <div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
                            <h4>Work Delivery</h4>
                            <button data-bs-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 32 32" fill="none">
                                    <circle cx="16" cy="16" r="16" fill="#FF3838" />
                                    <path d="M22.2188 9.77734L8.88614 23.1107" stroke="white" stroke-width="1.8"
                                        stroke-linecap="round" />
                                    <path d="M22.2188 23.1094L8.88614 9.77605" stroke="white" stroke-width="1.8"
                                        stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                        <div class="pt-4">
                            <div class="border rounded-3 p-4">
                                <h4 class="text-dark-300 fw-bold fs-6 mb-2">
                                    Submit the completed work to the buyer
                                </h4>
                                <form>
                                    <div class="d-grid gap-3">
                                        <div>
                                            <label for="upload-work" class="border rounded-2 p-3 text-center">
                                                <img src="assets/img/dashboard/gigs/gallery-icon.png" alt="" />
                                                <p class="text-dark-200">Upload Work</p>
                                                <input class="d-none" type="file" name=""
                                                    id="upload-work" />
                                            </label>
                                            <p class="text-14 text-dark-200 mt-2">
                                                Only .zip files allowed and maximum size of 100 MB
                                            </p>
                                        </div>
                                        <div>
                                            <label class="text-dark-300 fw-semibold text-18 mb-2">
                                                Quick Response
                                            </label>
                                            <textarea class="form-control shadow-none p-3" placeholder="Describe your delivery in details" rows="4"></textarea>
                                        </div>
                                        <div>
                                            <button class="w-btn-secondary-lg">Submit Work</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
