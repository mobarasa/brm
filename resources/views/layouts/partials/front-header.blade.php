<header class="header">
    <div class="top_bar">
        <div class="top_bar_background" style="background-image:url({{ asset('fronts/images/top_bar.jpg') }})"></div>
        <div class="top_bar_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                            <ul class="top_bar_contact_list">
                                @forelse ($address as $item)
                                <li>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <div>{{ __('Email:') }} {!! $item->email !!}</div>
                                </li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <div>{{ __('Call Us:') }} {!! $item->phone !!}</div>
                                </li>
                                @empty
                                <li>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <div>{{ __('Email:') }} info@example.com</div>
                                </li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <div>{{ __('Call Us:') }} 0123456789</div>
                                </li>
                                @endforelse
                            </ul>
                            <div class="top_bar_social ml-auto">
                                <ul class="social_list">
                                    @include('layouts.partials.social')
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo_container">
                            <a href="{{ route('page.index') }}">
                                <div class="logo"><img src="{{ asset('fronts/images/logo.png') }}" alt=""></div>
                                <div class="logo_text">{{ __('BRM') }}</div>
                            </a>
                        </div>
                        <nav class="main_nav_contaner ml-auto">
                            <ul class="main_nav">
                                <li class="{{ (request()->is('/')) ? 'active' : '' }}">
                                    <a href="{{ route('page.index') }}">{{ __('Home') }}</a>
                                </li>
                                <li class="{{ request()->is('about-us') ? 'active' : '' }}">
                                    <a href="{{ route('page.about') }}">{{ __('About') }}</a>
                                </li>
                                <li class="{{ request()->is('sermon*') ? 'active' : '' }}">
                                    <a href="{{ route('page.sermon') }}">{{ __('Sermons') }}</a>
                                </li>
                                <li class="{{ request()->is('event*') ? 'active' : '' }}">
                                    <a href="{{ route('page.event') }}">{{ __('Events') }}</a>
                                </li>
                                <li class="{{ request()->is('blog*') ? 'active' : '' }}">
                                    <a href="{{ route('page.blog') }}">{{ __('Blog') }}</a>
                                </li>
                                <li class="{{ request()->is('contact-us') ? 'active' : '' }}">
                                    <a href="{{ route('page.contact') }}">{{ __('Contact') }}</a>
                                </li>
                                <li class="{{ request()->is('giving-and-donations') ? 'active' : '' }}">
                                    <a href="{{ route('page.donation') }}">{{ __('Giving') }}</a>
                                </li>
                                @if (Route::has('login'))
                                    @auth
                                        <li><a href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a></li>
                                    @endauth
                                @endif
                            </ul>
                        </nav>

                        <div class="hamburger ml-auto">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
