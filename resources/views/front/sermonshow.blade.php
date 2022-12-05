@extends('layouts.main')

@section('content')
    <div class="home">
        <div class="home_background" style="background-image: url({{ asset('fronts/images/events.jpg') }})"></div>
        <div class="home_content">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row align-items-center justify-content-start">
                        <div class="home_title">{{ __('Sermon') }}</div>
                        <div class="breadcrumbs ml-auto">
                            <ul>
                                <li><a href="{{ route('page.index') }}">{{ __('Home') }}</a></li>
                                <li><a href="{{ route('page.sermon') }}">{{ __('Sermon') }}</a></li>
                                <li>{{ __(' Sermon Single') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="blog_image">
                    @if ($sermon->upload_image)
                        <img src="{{ asset('storage/uploads/sermons/' . $sermon->upload_image) }}" class="img-responsive" />
                    @else
                        <img src="{{ asset('storage/uploads/no_image.jpg') }}" class="img-responsive" />
                    @endif
                    </div>

                    <div
                        class="blog_post_title_container d-flex flex-row align-items-lg-center align-items-start justify-content-start">
                        <div class="blog_post_date">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="blog_post_day">{{ $sermon->created_at->format('j') }}</div>
                                <div class="blog_post_month">{{ $sermon->created_at->format('M') }}</div>
                            </div>
                        </div>
                        <div class="blog_post_title_content">
                            <div class="blog_post_title">{!! $sermon->title !!}</div>
                            <div class="blog_post_meta">
                                <ul>
                                    <li><i class="fa fa-user-pen" aria-hidden="true"></i><a href="#">{{ $sermon->user->name }}</a></li>
                                    <li><i class="fa fa-user-secret" aria-hidden="true"></i><a href="#">{{ $sermon->preacher }}</a></li>
                                    <li><i class="fa fa-book-bible" aria-hidden="true"></i><a href="#">{{ $sermon->bible_passage }}</a></li>
                                    @if ($sermon->media_link != null)
                                    <li><i class="fa-brands fa-youtube" aria-hidden="true"></i><a href="{!! $sermon->media_link !!}" target="_blank">Youtube</a></li>
                                    @endif
                                    <li><i class="fa fa-location-dot" aria-hidden="true"></i><a href="#">{{ $sermon->location }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog_post_text">
                        {!! nl2br($sermon->content) !!}
                    </div>
                    <div class="social_and_tags d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="blog_social">
                            <ul>
                                @include('layouts.partials.social')
                            </ul>
                        </div>
                        <div class="blog_post_tags ml-lg-auto">
                            <ul>
                                <li><a href="#">{{ $sermon->category->name }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/blog_single.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/blog_single_responsive.css') }}">
@endpush

@push('script')
    <script src="{{ asset('fronts/js/blog_single.js') }}"></script>
@endpush
