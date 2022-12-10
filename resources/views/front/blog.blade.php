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
                                <li>{{ __('Blog') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="news">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <div class="section_title">latest news</div>
                        <div class="section_subtitle">
                            Be part of a community of people experiencing God together.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row news_row">
                @forelse ($posts as $post)
                    <div class="col-xl-4 col-lg-6 news_post_col">
                        <div class="news_post">
                            <div class="news_image">
                                <img src="{{ asset($post->image_exist ? 'storage/posts/'.$post->upload_image : 'storage/default/no_image.jpg') }}" class="img-responsive" alt="" style="width:360px; height:262px;">
                            </div>
                            <div class="news_post_content">
                                <div class="news_post_title">
                                    <a href="{!! route('page.blogshow', $post->slug) !!}">{!! Str::limit($post->title, $limit = 30, $end = '...') !!}</a>
                                </div>
                                <div class="news_post_meta">
                                    <ul>
                                        <li>
                                            <i class="fa fa-user" aria-hidden="true"></i><a href="#">{{ $post->user->name }}</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-calendar" aria-hidden="true"></i><a href="#">{{ $post->created_at->format('d M, Y') }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="news_post_text">
                                    {!! Str::limit($post->content, $limit = 165, $end = '...') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="row h-100 justify-content-center align-items-center">
                    <h3>There are currently no posts to display.</h3>
                </div>
                @endforelse
            </div>

            <div class="row">
                <div class="col">
                    <div class="page_nav">
                        {!! $posts->links('layouts.partials.frontpagination') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/blog.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/blog_responsive.css') }}">
@endpush

@push('script')
    <script src="{{ asset('fronts/js/blog.js') }}"></script>
@endpush
