@extends('frontend.layouts.app')



@section('content')
    <div class="bg-page">

        <!-- Page Header Start -->
        <header class="page-banner-header blank-page-banner-header gradient-bg position-relative">
            <div class="section-overlay">
                <div class="blank-page-banner-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="page-banner-content text-center">
                                    <h3 class="page-banner-heading color-heading pb-15"> {{__('My Cards')}} </h3>

                                    <!-- Breadcrumb Start-->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item font-14"><a href="{{route('affiliate.dashboard')}}">{{__('Dashboard')}}</a></li>
                                            <li class="breadcrumb-item font-14 active" aria-current="page">{{__('My Cards')}}</li>
                                        </ol>
                                    </nav>
                                    <!-- Breadcrumb End-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Header End -->
        <section class="wishlist-page-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-10">
                        <div class="affiliator-dashboard-wrap bg-white">
                            <div class="row affiliator-dashboard-title align-items-center border-bottom mb-30 pb-20 mx-0">
                                <div class="col-md-12 col-lg-5 col-xl-5 px-0">
                                    <h5>{{ __('Add Account For Withdraw') }}</h5>
                                </div>
                                <div class="col-md-12 col-lg-7 col-xl-7 px-0">
                                    <div class="affiliate-top-title-btns text-end">
                                        <a href=" {{ route('wallet./') }}" class="theme-btn theme-button1 green-theme-btn default-hover-btn">GoTo Wallet</a>
                                    </div>
                                </div>
                            </div>

                            <div class="instructor-profile-right-part">
                                <div class="instructor-my-cards-box instructor-payment-settings-page bg-white">
                                    <div class="row">
                                        <!-- instructor my-cards form item start -->
                                        <div class="col-12 col-sm-12 col-lg-6">
                                            <div class="payment-settings-box">

                                                <div class="add-payment-settings-title d-flex align-items-center justify-content-between">
                                                    <p class="font-medium color-heading">{{ __('Add card') }}</p>
                                                    <div class="add-card-img"><img src="{{asset('frontend/assets/img/instructor-img/add-visa-master-card.png')}}" alt="Paypal" class="img-fluid"></div>

                                                </div>
                                                <form method="POST" action="{{route('wallet.save.my-card')}}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12 mb-30">
                                                            <label class="font-medium font-15 color-heading">{{ __('Card number') }}</label>
                                                            <input type="text" name="card_number" value="{{auth::user()->card ? auth::user()->card->card_number : ''}}" class="form-control" placeholder="{{ __('1245 2154 2154 215') }}">
                                                            @if ($errors->has('card_number'))
                                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('card_number') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 mb-30">
                                                            <label class="font-medium font-15 color-heading">{{ __('Card Holder Name') }}</label>
                                                            <input type="text" class="form-control" name="card_holder_name" value="{{auth::user()->card ? auth::user()->card->card_holder_name : ''}}" placeholder="{{ __('Your name') }}">
                                                            @if ($errors->has('card_holder_name'))
                                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('card_holder_name') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-30">
                                                            <label class="font-medium font-15 color-heading">{{ __('Month') }}</label>
                                                            <select name="month" class="form-select">
                                                                <option value="">{{ __('Select Month') }}</option>
                                                                <option value="1" @if(auth::user()->card && auth::user()->card->month == 1) selected @endif >{{ __('January') }}</option>
                                                                <option value="2" @if(auth::user()->card && auth::user()->card->month == 2) selected @endif >{{ __('February') }}</option>
                                                                <option value="3" @if(auth::user()->card && auth::user()->card->month == 3) selected @endif >{{ __('March') }}</option>
                                                                <option value="4" @if(auth::user()->card && auth::user()->card->month == 4) selected @endif >{{ __('April') }}</option>
                                                                <option value="5" @if(auth::user()->card && auth::user()->card->month == 5) selected @endif >{{ __('May') }}</option>
                                                                <option value="6" @if(auth::user()->card && auth::user()->card->month == 6) selected @endif >{{ __('June') }}</option>
                                                                <option value="7" @if(auth::user()->card && auth::user()->card->month == 7) selected @endif >{{ __('July') }}</option>
                                                                <option value="8" @if(auth::user()->card && auth::user()->card->month == 8) selected @endif >{{ __('August') }}</option>
                                                                <option value="9" @if(auth::user()->card && auth::user()->card->month == 9) selected @endif >{{ __('September') }}</option>
                                                                <option value="10" @if(auth::user()->card && auth::user()->card->month == 10) selected @endif >{{ __('October') }}</option>
                                                                <option value="11" @if(auth::user()->card && auth::user()->card->month == 11) selected @endif >{{ __('November') }}</option>
                                                                <option value="12" @if(auth::user()->card && auth::user()->card->month == 12) selected @endif >{{ __('December') }}</option>
                                                            </select>
                                                            @if ($errors->has('month'))
                                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('month') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 mb-30">
                                                            <label class="font-medium font-15 color-heading">{{ __('Year') }}</label>
                                                            <select name="year" class="form-select">
                                                                <option value="">{{ __('Select Year') }}</option>
                                                                @for($year = \Carbon\Carbon::now()->format('Y'); $year < \Carbon\Carbon::now()->addYear(20)->format('Y'); $year++)
                                                                    <option value="{{$year}}" @if(auth::user()->card && auth::user()->card->year == $year) selected @endif >{{$year}}</option>
                                                                @endfor
                                                            </select>
                                                            @if ($errors->has('year'))
                                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('year') }}</span>
                                                            @endif
                                                        </div>

                                                    </div>

                                                    <div class="col-12">
                                                        <button type="submit" class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100">{{ __('Save Card') }}</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                        <!-- instructor my-cards form item end -->

                                        <!-- instructor my-cards form item start -->
                                        <div class="col-12 col-sm-12 col-lg-6">
                                            <div class="payment-settings-box add-paypal-payment-box">

                                                <div class="add-payment-settings-title d-flex align-items-center justify-content-between">
                                                    <p class="font-medium color-heading">{{ __('Add card') }}</p>
                                                    <div class="add-card-img"><img src="{{asset('frontend/assets/img/instructor-img/add-paypal.png')}}" alt="Paypal" class="img-fluid"></div>

                                                </div>
                                                <form method="POST" action="{{route('wallet.save.paypal')}}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12 mb-30">
                                                            <label class="font-medium font-15 color-heading">{{ __('Paypal Email') }}</label>
                                                            <input type="email" class="form-control" name="email" value="{{auth::user()->paypal ? auth::user()->paypal->email : ''}}" placeholder="EX. example@email.com">
                                                            @if ($errors->has('email'))
                                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('email') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <button type="submit" class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100">{{ __('Save Paypal') }}</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                        <!-- instructor my-cards form item end -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection


