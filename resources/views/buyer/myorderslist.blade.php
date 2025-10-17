@extends('buyer.layout.buyerlayout')

{{-- PageTitle --}}
@section('pagetitle')
    My Orders
@endsection

{{-- Main Content --}}
@section('maincontent')
    <div class="flex-grow-1 align-items-center">

        <!-- Main -->
        <main class="dashboard-main min-vh-100">
            <div class="d-flex flex-column gap-4">
                <!-- Header -->
                <div class="d-flex align-items-md-center flex-column flex-md-row gap-4 justify-content-between">
                    <div>
                        <h3 class="text-24 fw-bold text-dark-300 mb-2">My Orders</h3>
                        <ul class="d-flex align-items-center gap-2">
                            <li class="text-dark-200 fs-6">Dashboard</li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="5" height="11" viewBox="0 0 5 11"
                                    fill="none">
                                    <path d="M1 10L4 5.5L1 1" stroke="#5B5B5B" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </li>
                            <li class="text-lime-300 fs-6">My Orders</li>
                        </ul>
                    </div>
                    <div>
                        <a href="buyer-create-job-post.html" class="w-btn-secondary-lg">
                            Post a Job</a>
                    </div>
                </div>
                <!-- Content -->
                <div>

                    <nav>
                        <div class="d-flex flex-wrap gap-3 align-items-center" id="nav-tab" role="tablist">
                            <button class="dashboard-tab-btn active" id="nav-all-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all"
                                aria-selected="true">
                                All({{ $openjobscount }}) </button>
                            <button class="dashboard-tab-btn" id="nav-active-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-active" type="button" role="tab" aria-controls="nav-active"
                                aria-selected="false">
                                Active(4)
                            </button>
                            <button class="dashboard-tab-btn" id="nav-completed-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-completed"
                                aria-selected="false">
                                Completed(10)
                            </button>
                        </div>
                    </nav>
                    <!-- Tab Content -->
                    <div class="tab-content mt-4" id="nav-tabContent">
                        <!-- Display Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Display Error Message -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- All -->
                        <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab"
                            tabindex="0">
                            <!-- My Job -->
                            <div class="overflow-x-auto">
                                <div class="w-100">
                                    <table class="w-100 dashboard-table">
                                        <thead class="pb-3">
                                            <tr>
                                                <th scope="col" class="ps-4">Project Name</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Status</th>
                                                {{-- <th scope="col">Proposal</th> --}}
                                                <th scope="col">Days</th>
                                                <th scope="col" class="pe-5 text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $images = ['1.svg', '2.svg', '3.svg', '4.svg'];
                                                $i = -1;
                                            @endphp
                                            @foreach ($jobs as $job)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex gap-3 align-items-center project-name">
                                                            <div class="rounded-3">
                                                                <img src='{{ asset('assets/img/job/' . $images[$i + 1]) }}'
                                                                    alt="" />
                                                            </div>
                                                            <div>
                                                                <p class="text-dark-200">
                                                                    {{ $job->J_title }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-dark-200">${{ $job->J_budget }}</td>
                                                    <td>
                                                        <span class="status-badge pending"> {{ $job->J_status }} </span>
                                                    </td>
                                                    {{-- <td class="text-dark-200">
                                                        <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                            {{ $proposaljobscount }}
                                                        </a>
                                                    </td> --}}
                                                    <td class="text-dark-200">{{ $job->created_at->format('F j, Y') }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-2">
                                                            <button class="dashboard-action-btn" data-bs-toggle="modal"
                                                                data-bs-target="#orderDetails{{ $job->J_id }}">
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
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Pagination -->
                            <div class="row justify-content-end mt-20">
                                <div class="col-auto">
                                    <nav aria-label="Page navigation example">
                                        <ul class="custom-pagination pagination">
                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link page-link" href="#">Previous</a>
                                            </li>
                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link page-link" href="#">1</a>
                                            </li>
                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link page-link" href="#">2</a>
                                            </li>
                                            <li class="custom-page-item page-item active" aria-current="page">
                                                <a class="custom-page-link page-link" href="#">3</a>
                                            </li>
                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link page-link" href="#">4</a>
                                            </li>

                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link custom-page-item page-link"
                                                    href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- Active -->
                        <div class="tab-pane fade" id="nav-active" role="tabpanel" aria-labelledby="nav-active-tab"
                            tabindex="0">
                            <div class="tab-pane fade show active" id="nav-all" role="tabpanel"
                                aria-labelledby="nav-all-tab" tabindex="0">
                                <!-- My Job -->
                                <div class="overflow-x-auto">
                                    <div class="w-100">
                                        <table class="w-100 dashboard-table">
                                            <thead class="pb-3">
                                                <tr>
                                                    <th scope="col" class="ps-4">Project Name</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Proposal</th>
                                                    <th scope="col">Days</th>
                                                    <th scope="col" class="text-center ps-5">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jobs as $job)
                                                    @if ($job->J_status == 'open')
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex gap-3 align-items-center project-name">
                                                                    <div class="rounded-3">
                                                                        <img src="assets/img/dashboard/projects/1.png"
                                                                            alt="" />
                                                                    </div>
                                                                    <div>
                                                                        <p class="text-dark-200">
                                                                            {{ $job->J_title }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-dark-200">${{ $job->J_budget }}</td>
                                                            <td>
                                                                <span class="status-badge pending"> {{ $job->J_status }}
                                                                </span>
                                                            </td>
                                                            <td class="text-dark-200">
                                                                <a href="buyer-job-applicant-list.html"
                                                                    class="applicant-link">
                                                                    18
                                                                </a>
                                                            </td>
                                                            <td class="text-dark-200">02</td>
                                                            <td>
                                                                <div class="d-flex justify-content-end gap-2">
                                                                    <a href="buyer-create-job-post.html"
                                                                        class="dashboard-action-btn">
                                                                        <svg width="20" height="20"
                                                                            viewBox="0 0 20 20" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                                stroke="#5B5B5B" stroke-width="1.5"
                                                                                stroke-linecap="round" />
                                                                        </svg>
                                                                    </a>
                                                                    <button class="dashboard-action-btn">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="48" height="48"
                                                                            viewBox="0 0 48 48" fill="none">
                                                                            <circle cx="24" cy="24" r="24"
                                                                                fill="#EDEBE7" />
                                                                            <path
                                                                                d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                                stroke="#5B5B5B" stroke-width="1.5" />
                                                                            <circle cx="23.668" cy="24.167" r="3.5"
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
                                <!-- Pagination -->
                                <div class="row justify-content-end mt-20">
                                    <div class="col-auto">
                                        <nav aria-label="Page navigation example">
                                            <ul class="custom-pagination pagination">
                                                <li class="custom-page-item page-item">
                                                    <a class="custom-page-link page-link" href="#">Previous</a>
                                                </li>
                                                <li class="custom-page-item page-item">
                                                    <a class="custom-page-link page-link" href="#">1</a>
                                                </li>
                                                <li class="custom-page-item page-item">
                                                    <a class="custom-page-link page-link" href="#">2</a>
                                                </li>
                                                <li class="custom-page-item page-item active" aria-current="page">
                                                    <a class="custom-page-link page-link" href="#">3</a>
                                                </li>
                                                <li class="custom-page-item page-item">
                                                    <a class="custom-page-link page-link" href="#">4</a>
                                                </li>

                                                <li class="custom-page-item page-item">
                                                    <a class="custom-page-link custom-page-item page-link"
                                                        href="#">Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Empty -->
                        <div class="tab-pane fade" id="nav-empty" role="tabpanel" aria-labelledby="nav-empty-tab"
                            tabindex="0">
                            <div class="row justify-content-center">
                                <div class="col-7">
                                    <div>
                                        <div
                                            class="bg-white p-5 rounded-3 d-flex justify-content-center align-items-center">
                                            <div class="d-flex flex-column align-items-center">
                                                <img src="assets/img/dashboard/empty-ill.png" class="img-fluid mb-5"
                                                    alt="" />
                                                <h3 class="text-24 fw-bold text-dark-300 m-2">
                                                    Order Empty
                                                </h3>
                                                <p class="fs-6 text-dark-200 text-center">
                                                    Empty order typically means that the list of items
                                                    you had previously added has been cleared
                                                    <span class="text-dark-300">Thank you</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Completed -->
                        <div class="tab-pane fade" id="nav-completed" role="tabpanel"
                            aria-labelledby="nav-completed-tab" tabindex="0">
                            <div class="overflow-x-auto">
                                <div class="w-100">
                                    <table class="w-100 dashboard-table">
                                        <thead class="pb-3">
                                            <tr>
                                                <th scope="col" class="ps-4">Project Name</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Proposal</th>
                                                <th scope="col">Days</th>
                                                <th scope="col" class="pe-5 text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/1.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Software engineer for android Development
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>
                                                <td>
                                                    <span class="status-badge pending"> Close </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/2.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Senior Manager, Finance and Administration
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>

                                                <td>
                                                    <span class="status-badge in-progress">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/3.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Web Developer cum Designer (for ngen LTD.)
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>
                                                <td>
                                                    <span class="status-badge canceled">
                                                        Complete
                                                    </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/4.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Jr. Software Project Coordinator (Onsite)
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>
                                                <td>
                                                    <span class="status-badge canceled">
                                                        Complete
                                                    </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/5.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Software engineer for android Development...
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>
                                                <td>
                                                    <span class="status-badge canceled">
                                                        Complete
                                                    </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/6.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Senior Manager, Finance and Administration
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>
                                                <td>
                                                    <span class="status-badge canceled">
                                                        Complete
                                                    </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>

                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/7.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Brote - Cleanin Service Elementor Template
                                                                Kit
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>
                                                <td>
                                                    <span class="status-badge pending"> Closed </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Pagination -->
                            <div class="row justify-content-end mt-20">
                                <div class="col-auto">
                                    <nav aria-label="Page navigation example">
                                        <ul class="custom-pagination pagination">
                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link page-link" href="#">Previous</a>
                                            </li>
                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link page-link" href="#">1</a>
                                            </li>
                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link page-link" href="#">2</a>
                                            </li>
                                            <li class="custom-page-item page-item active" aria-current="page">
                                                <a class="custom-page-link page-link" href="#">3</a>
                                            </li>
                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link page-link" href="#">4</a>
                                            </li>

                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link custom-page-item page-link"
                                                    href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- Close -->
                        <div class="tab-pane fade" id="nav-close" role="tabpanel" aria-labelledby="nav-close-tab"
                            tabindex="0">
                            <div class="overflow-x-auto">
                                <div class="w-100">
                                    <table class="w-100 dashboard-table">
                                        <thead class="pb-3">
                                            <tr>
                                                <th scope="col" class="ps-4">Project Name</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Proposal</th>
                                                <th scope="col">Days</th>
                                                <th scope="col" class="pe-5 text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/1.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Software engineer for android Development
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>
                                                <td>
                                                    <span class="status-badge pending"> Close </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/2.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Senior Manager, Finance and Administration
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>

                                                <td>
                                                    <span class="status-badge in-progress">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/3.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Web Developer cum Designer (for ngen LTD.)
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>
                                                <td>
                                                    <span class="status-badge canceled">
                                                        Complete
                                                    </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/4.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Jr. Software Project Coordinator (Onsite)
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>
                                                <td>
                                                    <span class="status-badge canceled">
                                                        Complete
                                                    </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/5.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Software engineer for android Development...
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>
                                                <td>
                                                    <span class="status-badge canceled">
                                                        Complete
                                                    </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/6.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Senior Manager, Finance and Administration
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>
                                                <td>
                                                    <span class="status-badge canceled">
                                                        Complete
                                                    </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>

                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center project-name">
                                                        <div class="rounded-3">
                                                            <img src="assets/img/dashboard/projects/7.png"
                                                                alt="" />
                                                        </div>
                                                        <div>
                                                            <p class="text-dark-200">
                                                                Brote - Cleanin Service Elementor Template
                                                                Kit
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-dark-200">$15</td>
                                                <td>
                                                    <span class="status-badge pending"> Closed </span>
                                                </td>
                                                <td class="text-dark-200">
                                                    <a href="buyer-job-applicant-list.html" class="applicant-link">
                                                        18
                                                    </a>
                                                </td>
                                                <td class="text-dark-200">02</td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="buyer-create-job-post.html" class="dashboard-action-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </a>
                                                        <button class="dashboard-action-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48" fill="none">
                                                                <circle cx="24" cy="24" r="24"
                                                                    fill="#EDEBE7" />
                                                                <path
                                                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                                <circle cx="23.668" cy="24.167" r="3.5"
                                                                    stroke="#5B5B5B" stroke-width="1.5" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Pagination -->
                            <div class="row justify-content-end mt-20">
                                <div class="col-auto">
                                    <nav aria-label="Page navigation example">
                                        <ul class="custom-pagination pagination">
                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link page-link" href="#">Previous</a>
                                            </li>
                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link page-link" href="#">1</a>
                                            </li>
                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link page-link" href="#">2</a>
                                            </li>
                                            <li class="custom-page-item page-item active" aria-current="page">
                                                <a class="custom-page-link page-link" href="#">3</a>
                                            </li>
                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link page-link" href="#">4</a>
                                            </li>

                                            <li class="custom-page-item page-item">
                                                <a class="custom-page-link custom-page-item page-link"
                                                    href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Details -->

        @foreach ($jobs as $job)
            <div class="modal fade" id="orderDetails{{ $job->J_id }}" tabindex="-1"
                aria-labelledby="exampleOrderDetails" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="bg-white rounded-3 p-lg-5">
                                <div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
                                    <h4>Proposals Detail</h4>
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
                                @php
                                    $proposalCount = 1;
                                @endphp
                                @foreach ($job->proposals as $proposal)
                                    @if ($proposal->P_status == 'accepted' || $proposal->P_status == 'queue' || $proposal->P_status == 'completed')
                                        <div class="mb-4 pt-4">
                                            <div class="row g-4">
                                                <div class="col-xl-12 col-lg-12">
                                                    <div class="bg-offWhite p-4 rounded-4">
                                                        <p class="text-dark-200 fw-bold mb-4">Proposal No:
                                                            {{ $proposalCount++ }}</p>
                                                        <div
                                                            class="d-flex flex-column flex-md-row gap-3 justify-content-between">
                                                            <div class="d-flex gap-3 align-items-center">
                                                                <div class="order-img">
                                                                    <img src="{{ asset('gig_images/' . $proposal->gig->G_image) }}"
                                                                        alt=""
                                                                        style="height: 60px; width: 60px; border-radius: 8px;" />
                                                                </div>
                                                                <div>
                                                                    <p class="text-dark-200">
                                                                        <b>GIG: <br></b> {{ $proposal->gig->G_title }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <div>
                                                            <p class="text-lime-300">#888654</p>
                                                            <p class="text-14 text-dark-200">3 Hours 5 min ago</p>
                                                        </div> --}}
                                                        <div class="bg-white p-3 rounded-3 mt-4">
                                                            <p class="text-dark-200">
                                                                <b>COVERLETTER: <br> </b> {{ $proposal->P_coverletter }}
                                                            </p>
                                                        </div>

                                                        <div
                                                            class="d-flex mt-4 flex-column gap-3 flex-lg-row justify-content-between">
                                                            <div
                                                                class="d-flex flex-column justify-content-center flex-lg-row gap-3">
                                                                @if ($proposal->P_status == 'queue')
                                                                    <form
                                                                        action="{{ route('ordercompleterequest', [$proposal->P_id, $job->J_id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="row p-3">
                                                                            <div class="col-6">
                                                                                @if ($proposal->worksubmit)
                                                                                    <p>Download Work File: <a
                                                                                            href="{{ asset('worksubmit/' . $proposal->worksubmit) }}"
                                                                                            download>{{ $proposal->worksubmit }}</a>
                                                                                    </p>
                                                                                @else
                                                                                    <p>No work file uploaded.</p>
                                                                                @endif
                                                                            </div>

                                                                            <div class="col-6">
                                                                                <div class="form-container">
                                                                                    <label for="category"
                                                                                        class="form-label">Rate the
                                                                                        Freelancer's
                                                                                        work:</label>
                                                                                    <select name="rating"
                                                                                        class="form-select shadow-none">
                                                                                        <option value="5">5 -
                                                                                            Excellent</option>
                                                                                        <option value="4">4 - Good
                                                                                        </option>
                                                                                        <option value="3">3 - Average
                                                                                        </option>
                                                                                        <option value="2">2 - Poor
                                                                                        </option>
                                                                                        <option value="1">1 - Very
                                                                                            Poor</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        {{-- <label for="rating">Rate the Freelancer's
                                                                            work:</label>
                                                                        <select name="rating" class="form-control"
                                                                            id="rating" class="form-control" required>
                                                                            <option value="5">5 - Excellent</option>
                                                                            <option value="4">4 - Good</option>
                                                                            <option value="3">3 - Average</option>
                                                                            <option value="2">2 - Poor</option>
                                                                            <option value="1">1 - Very Poor</option>
                                                                        </select> --}}
                                                                        <button class="w-btn-secondary-lg" type="submit">
                                                                            Accept Complete Request
                                                                        </button>
                                                                    </form>
                                                                @elseif($proposal->P_status == 'completed')
                                                                    <p class="text-dark-200 fw-bolder">
                                                                        Order Completed!
                                                                    </p>
                                                                @endif


                                                                {{-- <form
                                                                    action="{{ route('declineProposal', $proposal->P_id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button class="text-danger text-decoration-underline">
                                                                        Decline Order
                                                                    </button>
                                                                </form>

                                                            </div>
                                                            <div>
                                                                <button class="w-btn-blue-lg">Download File</button>
                                                            </div> --}}
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endforeach

    </div>
@endsection
