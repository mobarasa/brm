@extends('layouts.main')

@section('content')
    <div class="home">
        <div class="home_background" style="background-image:url({{ asset('fronts/images/index.jpg') }})"></div>
        <div class="home_content text-center">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_title">
                            Belief in God as Father and Holy Spirit is at the heart of our faith.
                        </div>
                        <div class="button home_link"><a href="{{ route('page.donation') }}">Donate</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <div class="section_title">welcome to Believers Revival Mission</div>
                        <div class="section_subtitle">It's the start of an amazing journey of faith</div>
                    </div>
                </div>
            </div>
            <div class="row about_row">
                @forelse ($about as $item)
                <div class="col-lg-6">
                    <img src="{{ asset($item->image_exist ? 'storage/abouts/'.$item->upload_image : 'storage/default/no_image.jpg') }}" alt="" style="width:555px; height:auto;">
                </div>
                <div class="col-lg-6">
                    <div class="about_content">
                        <div class="about_text">
                            {!! Str::limit($item->content, $limit = 620, $end = '...') !!}
                        </div>
                        <div class="button about_button"><a href="{{ route('page.about') }}">read story</a></div>
                    </div>
                </div>
                @empty
                <div class="row h-100 justify-content-center align-items-center">
                    <h3>There currently no church summary to display.</h3>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="sermons">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <div class="section_title">sermons today</div>
                        <div class="section_subtitle">Our lives in praising God</div>
                    </div>
                </div>
            </div>
            <div class="row sermons_row">

                @forelse ($sermons as $item)
                <div class="col-lg-4 sermon_col">
                    <div class="card">
                        <img src="{{ asset($item->image_exist ? 'storage/sermons/'.$item->upload_image : 'storage/default/no_image.jpg') }}" class="img-responsive" alt="" style="width:360px; height:262px;">
                        <div class="card-body text-center">
                            <div class="card-title sermon_title">
                                <a href="{!! route('page.sermonshow', $item->slug) !!}">{!! Str::limit($item->title, $limit = 30, $end = '...') !!}</a>
                            </div>
                            <div class="card-text sermon_info_container">
                                <div class="sermon_info">
                                    <div class="sermon_info_title">Pastor: </div>
                                    <ul class="sermon_info_list">
                                        <li><a href="#">{!! $item->preacher !!}</a></li>
                                    </ul>
                                </div>
                                <div class="sermon_info">
                                    <div class="sermon_info_title">Categories: </div>
                                    <ul class="sermon_info_list">
                                        <li><a href="#">{{ $item->category->name }} </a></li>
                                    </ul>
                                </div>
                                <div class="sermon_links">
                                    <ul>
                                        @if ($item->media_link != null)
                                        <li>
                                            <a href="{!! $item->media_link !!}" target="_blank"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="row h-100 justify-content-center align-items-center">
                    <h3>There currently no sermons to display.</h3>
                </div>
                @endforelse

            </div>
        </div>
    </div>

    <div class="mission">
        @include('layouts.partials.mission')
    </div>

    <div class="events">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <div class="section_title">upcoming events</div>
                        <div class="section_subtitle">Experience God's Presence</div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="events_items d-flex flex-lg-row flex-column align-items-lg-start align-items-center justify-content-lg-between justify-content-center">

            @forelse ($events as $item)
            <div class="events_item">
                <div class="events_item_image">
                    <img src="{{ asset($item->image_exist ? 'storage/events/'.$item->upload_image : 'storage/default/no_image.jpg') }}" class="img-responsive" alt=""  style="height:260px;">
                </div>
                <div class="events_item_content d-flex flex-row align-items-start justfy-content-start">
                    <div class="event_date d-flex flex-column align-items-center justify-content-center">
                        <div class="event_day">{{ $item->start_date->format('j') }}</div>
                        <div class="event_month">{{ $item->start_date->format('M') }}</div>
                    </div>
                    <div class="event_content">
                        <div class="event_title"><a href="{!! route('page.eventshow', $item->slug) !!}">{!! Str::limit($item->title, $limit = 30, $end = '...') !!}</a></div>
                        <ul class="event_row">
                            <li>
                                <div class="event_icon"><img src="{{ asset('fronts/images/calendar.png') }}" alt="">
                                </div>
                                <span>{{ date('Y-m-d', strtotime($item->start_date)) }} - {{ date('Y-m-d', strtotime($item->end_date)) }}</span>
                            </li>
                            <li>
                                <div class="event_icon"><img src="{{ asset('fronts/images/location.png') }}" alt="">
                                </div>
                                <span>{!! $item->location !!}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            <div class="row h-100 justify-content-center align-items-center">
                <h3>There currently no events to display.</h3>
            </div>
            @endforelse

        </div>
    </div>

    <div class="latest_news">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <div class="section_title">latest news</div>
                        <div class="section_subtitle">Be part of a community of people experiencing God together.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row news_row">

                @forelse ($posts as $item)
                <div class="col-xl-4 col-lg-6 news_post_col">
                    <div class="news_post">
                        <div class="news_image">
                            <img src="{{ asset($item->image_exist ? 'storage/posts/'.$item->upload_image : 'storage/default/no_image.jpg') }}" class="img-responsive" alt="" style="width:360px; height:262px;">
                        </div>
                        <div class="news_post_content">
                            <div class="news_post_title">
                                <a href="{!! route('page.blogshow', $item->slug) !!}">{!! Str::limit($item->title, $limit = 30, $end = '...') !!}</a>
                            </div>
                            <div class="news_post_meta">
                                <ul>
                                    <li>
                                        <i class="fa fa-user" aria-hidden="true"></i><a href="#">{{ $item->user->name }}</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar" aria-hidden="true"></i><a href="#">{{ $item->created_at->format('d M, Y') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="news_post_text">
                                {!! Str::limit($item->content, $limit = 165, $end = '...') !!}
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="row h-100 justify-content-center align-items-center">
                    <h3>There currently no posts to display.</h3>
                </div>
                @endforelse


            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/responsive.css') }}">
@endpush

@push('script')
    <script src="{{ asset('fronts/js/custom.js') }}"></script>
@endpush
