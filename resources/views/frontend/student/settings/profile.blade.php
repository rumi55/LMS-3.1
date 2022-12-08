@extends('frontend.layouts.app')

@section('content')
    <div class="bg-page">
        <!-- Page Header Start -->
        @include('frontend.student.settings.header')
        <!-- Page Header End -->

        <!-- Student Profile Page Area Start -->
        <section class="student-profile-page">
            <div class="container">
                <div class="student-profile-page-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="row bg-white">
                                <!-- Student Profile Left part -->
                                @include('frontend.student.settings.sidebar')

                                <!-- Student Profile Right part -->
                                <div class="col-lg-9 p-0">
                                    <div class="student-profile-right-part">
                                        <h6>{{__('Profile')}}</h6>
                                        <form action="{{route('student.save-profile', [$student->uuid])}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="profile-top mb-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="profile-image radius-50">

                                                        <img class="avater-image" id="target1" src="{{getImageFile($user->image_path)}}" alt="img">
                                                        <div class="custom-fileuplode">
                                                            <label for="fileuplode" class="file-uplode-btn bg-hover text-white radius-50">
                                                                <span class="iconify" data-icon="bx:bx-edit"></span></label>
                                                            <input type="file" id="fileuplode" name="image" accept="image/*" class="putImage1" onchange="previewFile(this)">
                                                        </div>
                                                    </div>
                                                    <div class="author-info">
                                                        <p class="font-medium font-15 color-heading">{{__('Select Your Picture')}}</p>
                                                        <p class="font-14">{{ __('Accepted Image Files') }}: JPEG, JPG, PNG <br> {{ __('Accepted Size') }}: 300 x 300 (1MB)</p>
                                                    </div>
                                                </div>
                                                @if ($errors->has('image'))
                                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                                @endif
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-30">
                                                    <label class="font-medium font-15 color-heading">{{__('First Name')}}</label>
                                                    <input type="text"  name="first_name" value="{{$student->first_name}}" class="form-control" placeholder="{{__('First Name')}}">
                                                    @if ($errors->has('first_name'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('first_name') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 mb-30">
                                                    <label class="font-medium font-15 color-heading">{{__('Last Name')}}</label>
                                                    <input type="text" name="last_name" value="{{$student->last_name}}" class="form-control" placeholder="{{__('Last Name')}}">
                                                    @if ($errors->has('last_name'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('last_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-30">
                                                    <label class="font-medium font-15 color-heading">{{__('Email')}}</label>
                                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="{{ __('Type your email') }}">
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-30">
                                                    <label class="font-medium font-15 color-heading">{{__('Phone Number')}}</label>
                                                    <input type="text" name="phone_number" value="{{$student->phone_number}}" class="form-control" placeholder="{{ __('Type your phone number') }}">
                                                    @if ($errors->has('phone_number'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('phone_number') }}</span>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-30">
                                                    <label class="font-medium font-15 color-heading">{{__('Bio')}}</label>
                                                    <textarea class="form-control" name="about_me" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('Type about yourself') }}">{{$student->about_me}}</textarea>
                                                    @if ($errors->has('about_me'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('about_me') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-30">
                                                <div class="col-md-12">
                                                    <label class="font-medium font-15 color-heading">{{__('Gender')}}</label>

                                                    <div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" {{$student->gender == 'Male' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="inlineRadio1">{{__('Male')}}</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" {{$student->gender == 'Female' ? 'checked' : '' }} >
                                                            <label class="form-check-label" for="inlineRadio2">{{__('Female')}}</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Others" {{$student->gender == 'Others' ? 'checked' : '' }} >
                                                            <label class="form-check-label" for="inlineRadio3">{{__('Others')}}</label>
                                                        </div>
                                                    </div>

                                                    @if ($errors->has('gender'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('gender') }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="theme-btn theme-button1 theme-button3 font-15 fw-bold">{{__('Save Profile Now')}}</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Student Profile Page Area End -->
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

@push('script')
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
    <script src="{{asset('frontend/assets/js/custom/student-profile.js')}}"></script>
@endpush
