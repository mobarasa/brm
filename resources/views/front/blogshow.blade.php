@extends('layouts.main')

@section('content')
    <div class="home">
        <div class="home_background" style="background-image: url({{ asset('fronts/images/events.jpg') }})"></div>
        <div class="home_content">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row align-items-center justify-content-start">
                        <div class="home_title">{{ __('Blog') }}</div>
                        <div class="breadcrumbs ml-auto">
                            <ul>
                                <li><a href="{{ route('page.index') }}">{{ __('Home') }}</a></li>
                                <li><a href="{{ route('page.blog') }}">{{ __('Blog') }}</a></li>
                                <li>{{ __(' Blog Single') }}</li>
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
                    @if ($post->upload_image)
                        <img src="{{ asset('storage/uploads/posts/' . $post->upload_image) }}" class="img-responsive" />
                    @else
                        <img src="{{ asset('storage/uploads/no_image.jpg') }}" class="img-responsive" />
                    @endif
                    </div>

                    <div
                        class="blog_post_title_container d-flex flex-row align-items-lg-center align-items-start justify-content-start">
                        <div class="blog_post_date">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="blog_post_day">{{ $post->created_at->format('j') }}</div>
                                <div class="blog_post_month">{{ $post->created_at->format('M') }}</div>
                            </div>
                        </div>
                        <div class="blog_post_title_content">
                            <div class="blog_post_title">{!! $post->title !!}</div>
                            <div class="blog_post_meta">
                                <ul>
                                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="#">{{ $post->user->name }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog_post_text">
                        {!! nl2br($post->content) !!}
                    </div>
                    <div class="social_and_tags d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="blog_social">
                            <ul>
                                @include('layouts.partials.social')
                            </ul>
                        </div>
                        <div class="blog_post_tags ml-lg-auto">
                            <ul>
                                <li><a href="#">{{ $post->category->name }}</a></li>
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
