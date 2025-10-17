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
        background: url('assets/img/common/breadcrumb-bg.png') no-repeat
          center center/cover;">
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="position-relative z-2" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="linear">
                            <h2 class="section-title-light mb-2">Contact Us</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb w-breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Contact
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb End -->

        <!-- Contact Widgets  -->
        <section class="py-110 bg-offWhite">
            <div class="container">
                <div class="bg-white contact-widgets rounded-4 p-5">
                    <div class="row g-5 justify-content-between d-flex">
                        <div class="col-xxl col-lg-6">
                            <div
                                class="contact-widget-item d-flex text-center text-md-start flex-column align-content-md-start align-content-center flex-md-row gap-3">
                                <div>
                                    <img src="assets/img/contact/ic-1.svg" alt="" />
                                </div>
                                <div class="flex-shrink-0">
                                    <h4 class="contact-widget-title">Phone</h4>
                                    <p class="contact-widget-info">+(323) 9847 3847 383</p>
                                    <p class="contact-widget-info">+(434) 5466 5467 443</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl col-lg-6">
                            <div
                                class="contact-widget-item d-flex text-center text-md-start flex-column align-content-md-start align-content-center flex-md-row gap-3">
                                <div>
                                    <img src="assets/img/contact/ic-2.svg" alt="" />
                                </div>
                                <div class="flex-shrink-0">
                                    <h4 class="contact-widget-title">Email</h4>
                                    <p class="contact-widget-info">infoyour@gmail.com</p>
                                    <p class="contact-widget-info">
                                        abdur.rohman2003@gmail.com
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl col-lg-6">
                            <div
                                class="contact-widget-item d-flex text-center text-md-start flex-column align-content-md-start align-content-center flex-md-row gap-3">
                                <div>
                                    <img src="assets/img/contact/ic-3.svg" alt="" />
                                </div>
                                <div>
                                    <h4 class="contact-widget-title">Location</h4>
                                    <p class="contact-widget-info">
                                        4517 Washington Ave. 32 King Street.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl col-lg-6">
                            <div
                                class="contact-widget-item ps-0 ps-xl-4 text-center text-md-start text-md-start d-flex flex-column gap-3">
                                <div>
                                    <h4 class="contact-widget-title">Follow Us:</h4>
                                </div>
                                <div
                                    class="d-flex justify-content-center justify-content-md-start gap-4 contact-social-links">
                                    <a href="http://" target="_blank" rel="noopener noreferrer">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                    <a href="http://" target="_blank" rel="noopener noreferrer">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                    <a href="http://" target="_blank" rel="noopener noreferrer">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                    <a href="http://" target="_blank" rel="noopener noreferrer">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Widgets End -->

        <!-- Contact Form -->
        <section class="pb-110 bg-offWhite">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <div class="mb-5">
                                <h3 class="mb-4 contact-form-title">Get in Touch</h3>
                                <p class="contact-form-desc">
                                    Award-winning, family owned dealership of new and pre-owned
                                    lisline with several locations across the city. Lowest
                                    prices and the best customer service guaranteed.
                                </p>
                            </div>
                            <form>
                                <div class="row g-4">
                                    <div class="contact-form-input col-lg-6">
                                        <label for="name" class="form-label">
                                            Name <span class="text-lime-300">*</span>
                                        </label>
                                        <input type="text" id="name" placeholder="Name"
                                            class="form-control shadow-none" />
                                    </div>
                                    <div class="contact-form-input col-lg-6">
                                        <label for="fname" class="form-label">
                                            Phone <span class="text-lime-300">*</span></label>
                                        <input type="text" id="phone" placeholder="Phone Number"
                                            class="form-control shadow-none" />
                                    </div>
                                    <div class="contact-form-input col-lg-6">
                                        <label for="email" class="form-label">
                                            Email <span class="text-lime-300">*</span></label>
                                        <input type="text" id="email" placeholder="Email Here"
                                            class="form-control shadow-none" />
                                    </div>
                                    <div class="contact-form-input col-lg-6">
                                        <label for="subject" class="form-label">
                                            Subject <span class="text-lime-300">*</span></label>
                                        <input type="text" id="subject" placeholder="Subject"
                                            class="form-control shadow-none" />
                                    </div>
                                    <div class="contact-form-input col-lg-12">
                                        <label for="msg" class="form-label d-block">
                                            Message <span class="text-lime-300">*</span>
                                        </label>
                                        <textarea type="text" id="msg" placeholder="Message Here" class="form-textarea form-control shadow-none">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button class="w-btn-secondary-sm">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.25279991722!2d-74.1444877707482!3d40.69763123338159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1706100434082!5m2!1sen!2sbd"
                                allowfullscreen="" width="100%" height="650" style="border-radius: 16px"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Form End -->
    </main>
@endsection
