@extends('frontend.layouts.app')

@section('content')
<div class="bg-page">
<!-- Page Header Start -->
<header class="page-banner-header gradient-bg position-relative">
    <div class="section-overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="page-banner-content text-center">
                        <h3 class="page-banner-heading text-white pb-15">{{ __('Contact Us') }}</h3>

                        <!-- Breadcrumb Start-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item font-14"><a href="{{ url('/') }}">{{__('Home')}}</a></li>
                                <li class="breadcrumb-item font-14 active" aria-current="page">{{ __('Contact Us') }}</li>
                            </ol>
                        </nav>
                        <!-- Breadcrumb End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Page Header End -->

<!-- Contact Page Area Start -->
<section class="contact-page-area section-t-space">
    <div class="container">
        <div class="row">
            <!-- Contact page left side start-->
            <div class="col-md-6 col-lg-5 bg-white contact-page-left-side">

                <div class="contact-page-left-side-wrap">
                    <h5 class="contact-form-title font-24 font-semi-bold">{{ __(get_option('get_in_touch_title')) }}</h5>

                    <!-- Contact Info Item Start-->
                    <div class="contact-info-item d-flex align-items-center">
                        <div class="flex-shrink-0 contact-icon-img-wrap">
                            <img src="{{ asset('frontend/assets/img/icons-svg/contact-icon-1.png') }}" alt="feature">
                        </div>
                        <div class="flex-grow-1 ms-3 contact-info-content">
                            <p>{{ __(get_option('contact_us_location')) }}</p>
                        </div>
                    </div>
                    <!-- Contact Info Item End-->

                    <!-- Contact Info Item Start-->
                    <div class="contact-info-item d-flex align-items-center">
                        <div class="flex-shrink-0 contact-icon-img-wrap">
                            <img src="{{ asset('frontend/assets/img/icons-svg/contact-icon-2.png') }}" alt="feature">
                        </div>
                        <div class="flex-grow-1 ms-3 contact-info-content">
                            <p>{{ __(get_option('contact_us_email_one')) }}</p>
                            <p>{{ __(get_option('contact_us_email_two')) }}</p>
                        </div>
                    </div>
                    <!-- Contact Info Item End-->

                    <!-- Contact Info Item Start-->
                    <div class="contact-info-item d-flex align-items-center">
                        <div class="flex-shrink-0 contact-icon-img-wrap">
                            <img src="{{ asset('frontend/assets/img/icons-svg/contact-icon-3.png') }}" alt="feature">
                        </div>
                        <div class="flex-grow-1 ms-3 contact-info-content">
                            <p>{{ __(get_option('contact_us_phone_one')) }}</p>
                            <p>{{ __(get_option('contact_us_phone_two')) }}</p>
                        </div>
                    </div>
                    <!-- Contact Info Item End-->

                    <div class="contact-bottom-content">
                        <p class="color-gray mt-3">{{ __(get_option('contact_us_description')) }}</p>
                    </div>
                </div>

            </div>
            <!-- Contact page left side End-->

            <!-- Contact page right side start-->
            <div class="col-md-6 col-lg-7 bg-white contact-page-right">
                <div class="contact-form-area">
                    <h5 class="contact-form-title font-24 font-semi-bold">{{ __(get_option('send_us_msg_title')) }}</h5>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-30">
                                <input type="text" class="form-control" id="inputName" placeholder="{{ __('Your name') }}*">
                            </div>
                            <div class="col-md-6 mb-30">
                                <input type="email" class="form-control" id="inputEmail" placeholder="{{ __('Your Email') }}*">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-30">
                                <select id="inputState" class="form-select contact_us_issue_id">
                                    <option value="">{{__('Select an Issue')}}</option>
                                    @foreach($contactUsIssues as $issue)
                                    <option value="{{ $issue->id }}">{{ __($issue->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-30">
                                <textarea class="form-control message" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="theme-btn theme-button1 theme-button3 w-100 font-15 fw-bold submitContactUs">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Contact page right side End-->
        </div>

        <!-- Google Map Part Start-->
        <div class="row google-map-area section-t-space">
            <div class="col-12">
                <iframe src="{{ get_option('contact_us_map_link') }}" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <!-- Google Map Part End-->
    </div>
</section>
<!-- Contact Page Area End -->
</div>
<input type="hidden" value="{{ route('contact.store') }}" class="contactStoreRoute">
@endsection

@push('script')
    <script src="{{ asset('frontend/assets/js/custom/contact-us-store.js') }}"></script>
@endpush
