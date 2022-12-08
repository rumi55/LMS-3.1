<header class="header__area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="header__navbar">
                    <div class="header__navbar__left">
                        <button class="sidebar-toggler">
                            <img src="{{asset('admin/images/icons/header/bars.svg')}}" alt="">
                        </button>
                        <a href="{{ route('main.index') }}" class="btn btn-blue">{{ __('Visit Site') }}</a>
                    </div>

                    <div class="header__navbar__right">
                        <ul class="header__menu">

                            <li class="admin-notification-menu position-relative">
                                <a href="#" class="btn btn-dropdown site-language" id="dropdownNotification" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ @$totalAdminNotifications }}</span>
                                    <img src="{{asset('admin/images/icons/header/notification.svg')}}" alt="icon">
                                </a>
                                <!-- Notification Dropdown Start -->
                                <ul class="dropdown-menu custom-scrollbar" aria-labelledby="dropdownNotification">
                                    @forelse(@$adminNotifications as $notification)
                                        @if($notification->sender)
                                            <li>
                                                <a href="{{route('notification.url', [$notification->uuid])}}" class="message-user-item dropdown-item">
                                                    <div class="message-user-item-left">
                                                        <div class="single-notification-item d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div class="user-img-wrap position-relative radius-50">
                                                                    <img src="{{ asset($notification->sender->image_path) }}" alt="img" class="radius-50">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <h6 class="color-heading font-14">{{$notification->sender->name}}</h6>
                                                                <p class="font-13 mb-0">{{ __($notification->text) }}</p>
                                                                <div class="font-11 color-gray mt-1">{{$notification->created_at->diffForHumans()}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @empty
                                        <p class="text-center">{{__('No Data Found')}}</p>
                                    @endforelse
                                </ul>
                                <!-- Notification Dropdown End -->
                            </li>

                            <li>
                                <a href="#" class="btn btn-dropdown site-language" id="dropdownLanguage" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset(selectedLanguage()->flag)}}" alt="icon">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownLanguage">
                                    @foreach(appLanguages() as $app_lang)
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/local/'.$app_lang->iso_code) }}">
                                                <img src="{{asset($app_lang->flag)}}" alt="icon">
                                                <span>{{$app_lang->language}}</span>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                            <li>
                                <a href="#" class="btn btn-dropdown user-profile" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{getImageFile(auth::user()->image_path)}}" alt="icon">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownUser">
                                    <li>
                                        <a class="dropdown-item" href="{{route('admin.profile')}}">
                                            <img src="{{asset('admin/images/icons/user.svg')}}" alt="icon">
                                            <span>{{__('Profile')}}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.change-password') }}">
                                            <img src="{{asset('admin/images/icons/settings.svg')}}" alt="icon">
                                            <span>{{__('Change Password')}}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('logout')}}">
                                            <img src="{{asset('admin/images/icons/logout.svg')}}" alt="icon">
                                            <span>{{__('Logout')}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
