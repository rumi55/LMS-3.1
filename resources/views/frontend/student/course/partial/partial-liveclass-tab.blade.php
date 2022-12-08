<div class="tab-pane fade" id="LiveClass" role="tabpanel" aria-labelledby="LiveClass-tab">
    <div class="row">
        <div class="col-12">
            <div class="after-purchase-course-watch-tab bg-white p-30">
                <!-- If there is no data Show Empty Design Start -->
                <div class="empty-data d-none">
                    <img src="{{ asset('frontend/assets/img/empty-data-img.png') }}" alt="img" class="img-fluid">
                    <h5 class="my-3">{{ __('Empty Live Class') }} </h5>
                </div>
                <!-- If there is no data Show Empty Design End -->

                <div class="course-watch-live-class-wrap instructor-quiz-list-page">
                    <ul class="nav nav-tabs assignment-nav-tabs live-class-list-nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="upcoming-tab" data-bs-toggle="tab" data-bs-target="#upcoming" type="button" role="tab"
                                    aria-controls="upcoming" aria-selected="true">{{ __('Upcoming') }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="past-tab" data-bs-toggle="tab" data-bs-target="#past" type="button" role="tab"
                                    aria-controls="past" aria-selected="false">{{ __('Past') }}
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content live-class-list" id="myTabContent">
                        <div class="tab-pane fade show active" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
                            @if(count($upcoming_live_classes))
                            <div class="table-responsive table-responsive-xl">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('Date & Time') }}</th>
                                        <th scope="col">{{ __('Time Duration') }}</th>
                                        <th scope="col">{{ __('Topic') }}</th>
                                        <th scope="col">{{ __('Meeting Host Name') }}</th>
                                        <th scope="col">{{ __('Meeting Link') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($upcoming_live_classes as $upcoming_live_class)
                                    <tr>
                                        <td>{{ $upcoming_live_class->date }}</td>
                                        <td>{{ $upcoming_live_class->duration }} {{ __('minutes') }}</td>
                                        <td><div class="course-watch-live-class-topic">{{ Str::limit($upcoming_live_class->class_topic, 50) }}</div></td>
                                        <td>
                                            @if($upcoming_live_class->meeting_host_name == 'zoom')
                                                Zoom
                                            @elseif($upcoming_live_class->meeting_host_name == 'bbb')
                                                BigBlueButton
                                            @elseif($upcoming_live_class->meeting_host_name == 'jitsi')
                                                Jitsi
                                            @endif
                                        </td>
                                        <td>
                                            <div class="course-watch-meeting-link ">
                                                @if($upcoming_live_class->meeting_host_name == 'zoom')
                                                    <a href="{{ $upcoming_live_class->join_url }}" class="color-hover">{{ __('Go To Meeting') }}</a>
                                                    <span class="iconify copyZoomUrl" data-url="{{ $upcoming_live_class->join_url }}" data-icon="akar-icons:copy"></span>
                                                @elseif($upcoming_live_class->meeting_host_name == 'bbb')
                                                    <a href="{{ route('student.join-bbb-meeting', $upcoming_live_class->id) }}" class="color-hover">{{ __('Go To Meeting') }}</a>
                                                @elseif($upcoming_live_class->meeting_host_name == 'jitsi')
                                                    <a href="{{ route('join-jitsi-meeting', $upcoming_live_class->uuid) }}" class="color-hover">{{ __('Go To Meeting') }}</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <!-- If there is no data Show Empty Design Start -->
                                <div class="empty-data">
                                    <img src="{{ asset('frontend/assets/img/empty-data-img.png') }}" alt="img" class="img-fluid">
                                    <h5 class="my-3">{{ __('Empty Upcoming Class') }}</h5>
                                </div>
                                <!-- If there is no data Show Empty Design End -->
                            @endif
                        </div>
                        <div class="tab-pane fade" id="past" role="tabpanel" aria-labelledby="upcoming-tab">
                            @if(count($past_live_classes))
                            <div class="table-responsive table-responsive-xl">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('Date & Time') }}</th>
                                        <th scope="col">{{ __('Time Duration') }}</th>
                                        <th scope="col">{{ __('Topic') }}</th>
                                        <th scope="col">{{ __('Meeting Host Name') }}</th>
                                        <th scope="col">{{ __('Meeting Link') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($past_live_classes as $past_live_class)
                                    <tr>
                                        <td>{{ $past_live_class->date }}</td>
                                        <td>{{ $past_live_class->duration }} {{ __('minutes') }}</td>
                                        <td><div class="course-watch-live-class-topic">{{ Str::limit($past_live_class->class_topic, 50) }}</div></td>
                                        <td>
                                            @if($past_live_class->meeting_host_name == 'zoom')
                                                Zoom
                                            @elseif($past_live_class->meeting_host_name == 'bbb')
                                                BigBlueButton
                                            @elseif($past_live_class->meeting_host_name == 'jitsi')
                                                Jitsi
                                            @endif
                                        </td>
                                        <td>
                                            <div class="course-watch-meeting-link ">
                                                @if($past_live_class->meeting_host_name == 'zoom')
                                                    <a href="{{ $past_live_class->join_url }}" target="_blank" class="color-hover">{{ __('Go To Meeting') }}</a>
                                                    <span class="iconify copyZoomUrl" data-url="{{ $past_live_class->join_url }}" data-icon="akar-icons:copy"></span>
                                                @elseif($past_live_class->meeting_host_name == 'bbb')
                                                    <a href="{{ route('student.join-bbb-meeting', $past_live_class->id) }}" target="_blank" class="color-hover">{{ __('Go To Meeting') }}</a>
                                                @elseif($past_live_class->meeting_host_name == 'jitsi')
                                                    <a href="{{ route('join-jitsi-meeting', $past_live_class->uuid) }}" target="_blank"  class="color-hover">{{ __('Go To Meeting') }}</a>
                                                    Jitsi
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <!-- If there is no data Show Empty Design Start -->
                                <div class="empty-data">
                                    <img src="{{ asset('frontend/assets/img/empty-data-img.png') }}" alt="img" class="img-fluid">
                                    <h5 class="my-3">{{ __('Empty Past Class') }}</h5>
                                </div>
                                <!-- If there is no data Show Empty Design End -->
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
