@extends('layouts.main')

@section('content')
    <div class="home">
        <div class="home_background" style="background-image: url({{ asset('fronts/images/events.jpg') }})"></div>
        <div class="home_content">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row align-items-center justify-content-start">
                        <div class="home_title">{{ __('Sermons') }}</div>
                        <div class="breadcrumbs ml-auto">
                            <ul>
                                <li><a href="{{ route('page.index') }}">{{ __('Home') }}</a></li>
                                <li>{{ __('Sermons') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sermons">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <div class="section_title">list of sermons</div>
                        <div class="section_subtitle">Our lives in praising God</div>
                    </div>
                </div>
            </div>
            <div class="row sermons_row">

                @forelse ($sermons as $sermon)
                    <div class="col-lg-4 sermon_col">
                        <div class="card">
                            <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                <div class="event_day">{{ $sermon->date_preached->format('j') }}</div>
                                <div class="event_month">{{ $sermon->date_preached->format('M') }}</div>
                            </div>
                            @if ($sermon->upload_image)
                                <img class="card-img-top" src="{{ asset('storage/uploads/sermons/' . $sermon->upload_image) }}" class="img-responsive" alt="" />
                            @else
                                <img class="card-img-top" src="{{ asset('storage/uploads/no_image.jpg') }}" class="img-responsive" alt="" />
                            @endif
                            <div class="card-body text-center">
                                <div class="card-title sermon_title">
                                    <a href="{!! route('page.sermonshow', $sermon->slug) !!}">{!! Str::limit($sermon->title, $limit = 30, $end = '...') !!}</a>
                                </div>
                                <div class="card-text sermon_info_container">
                                    <div class="sermon_info">
                                        <div class="sermon_info_title">Pastor:</div>
                                        <ul class="sermon_info_list">
                                            <li><a href="#">{!! $sermon->preacher !!}</a></li>
                                        </ul>
                                    </div>
                                    <div class="sermon_info">
                                        <div class="sermon_info_title">Categories:</div>
                                        <ul class="sermon_info_list">
                                            <li><a href="#">{{ $sermon->category->name }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="sermon_links">
                                        <ul>
                                            @if ($sermon->media_link != null)
                                            <li>
                                                <a href="{!! $sermon->media_link !!}" target="_blank"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
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
                        <h3>There are currently no sermons to display.</h3>
                    </div>
                @endforelse

            </div>

            <div class="row">
                <div class="col">
                    <div class="page_nav">
                        {!! $sermons->links('layouts.partials.frontpagination') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/sermons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/sermons_responsive.css') }}">
@endpush

@push('script')
    <script src="{{ asset('fronts/js/sermons.js') }}"></script>
@endpush
