<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ __('BRM | Believers Revival Mission') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="At the Belivers Revival Mission Church, we believe in loving God, the Bible, people, and doing good. Find out how to get involved and be a part of our community."/>
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/plugins/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/colorbox.css') }}">
    @stack('style')

</head>

<body>
    <div class="super_container">
        @include('sweetalert::alert')
        @include('layouts.partials.front-header')


        <div class="menu d-flex flex-column align-items-center justify-content-center">
            <div class="menu_content">
                <div class="cross_1 d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset('fronts/images/logo.png') }}" alt="">
                </div>
                <nav class="menu_nav">
                    <ul>
                        <li class="{{ (request()->is('/')) ? 'active' : '' }}">
                            <a href="{{ route('page.index') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="{{ request()->is('about') ? 'active' : '' }}">
                            <a href="{{ route('page.about') }}">{{ __('About') }}</a>
                        </li>
                        <li class="{{ request()->is('sermon') ? 'active' : '' }}">
                            <a href="{{ route('page.sermon') }}">{{ __('Sermons') }}</a>
                        </li>
                        <li class="{{ request()->is('event') ? 'active' : '' }}">
                            <a href="{{ route('page.event') }}">{{ __('Events') }}</a>
                        </li>
                        <li class="{{ request()->is('blog') ? 'active' : '' }}">
                            <a href="{{ route('page.blog') }}">{{ __('Blog') }}</a>
                        </li>
                        <li class="{{ request()->is('contact') ? 'active' : '' }}">
                            <a href="{{ route('page.contact') }}">{{ __('Contact') }}</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a></li>
                            @endauth
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        </div>

        @yield('content')

        @include('layouts.partials.front-footer')
    </div>
    <script src="{{ asset('fronts/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('fronts/js/popper.js') }}"></script>
    <script src="{{ asset('fronts/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('fronts/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('fronts/js/easing.js') }}"></script>
    <script src="{{ asset('fronts/js/parallax.min.js') }}"></script>
    <script src="{{ asset('fronts/js/jquery.colorbox-min.js') }}"></script>
    @stack('script')
</body>

</html>
