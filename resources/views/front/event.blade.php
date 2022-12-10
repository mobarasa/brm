@extends('layouts.main')

@section('content')
    <div class="home">
        <div class="home_background" style="background-image: url({{ asset('fronts/images/events.jpg') }})"></div>
        <div class="home_content">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row align-items-center justify-content-start">
                        <div class="home_title">{{ __('Events') }}</div>
                        <div class="breadcrumbs ml-auto">
                            <ul>
                                <li><a href="{{ route('page.index') }}">{{ __('Home') }}</a></li>
                                <li>{{ __('Events') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="events">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <div class="section_title">list of events</div>
                        <div class="section_subtitle">
                            Events held and scheduled by us
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="events_items d-flex flex-lg-row flex-column align-items-lg-start align-items-center justify-content-lg-between justify-content-center flex-wrap">

            @forelse ($events as $event)
            <div class="events_item">
                <div class="events_item_image">
                <img src="{{ asset($event->image_exist ? 'storage/events/'.$event->upload_image : 'storage/default/no_image.jpg') }}" class="img-responsive" alt=""  style="height:260px;">
                </div>
                <div class="events_item_content d-flex flex-row align-items-start justfy-content-start">
                    <div class="event_date">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <div class="event_day">{{ $event->start_date->format('j') }}</div>
                            <div class="event_month">{{ $event->start_date->format('M') }}</div>
                        </div>
                    </div>
                    <div class="event_content">
                        <div class="event_title">
                            <a href="{!! route('page.eventshow', $event->slug) !!}">{!! Str::limit($event->title, $limit = 30, $end = '...') !!}</a>
                        </div>
                        <ul class="event_row">
                            <li>
                                <img src="{{ asset('fronts/images/calendar.png') }}" alt="">
                                <span>{{ date('Y-m-d', strtotime($event->start_date)) }} - {{ date('Y-m-d', strtotime($event->end_date)) }}</span>
                            </li>
                            <li>
                                <img src="{{ asset('fronts/images/location.png') }}" alt="">
                                <span>{!! $event->location !!}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            <div class="row h-100 justify-content-center align-items-center">
                <h3>There are currently no events to display.</h3>
            </div>
            @endforelse

        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page_nav">
                        {!! $events->links('layouts.partials.frontpagination') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/events.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/events_responsive.css') }}">
@endpush

@push('script')
    <script src="{{ asset('fronts/js/events.js') }}"></script>
@endpush
