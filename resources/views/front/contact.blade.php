@extends('layouts.main')

@section('content')
    <div class="home">
        <div class="home_background" style="background-image: url({{ asset('fronts/images/events.jpg') }})"></div>
        <div class="home_content">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row align-items-center justify-content-start">
                        <div class="home_title">{{ __('Contact') }}</div>
                        <div class="breadcrumbs ml-auto">
                            <ul>
                                <li><a href="{{ route('page.index') }}">{{ __('Home') }}</a></li>
                                <li>{{ __('Contact') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact_info">
                        <div class="contact_title">contact us</div>
                        <div class="contact_info_content">
                            <ul>
                                @forelse ($address as $item)
                                <li>
                                    <div>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </div>
                                    <span>{!! $item->address !!}</span>
                                </li>
                                <li>
                                    <div><i class="fa fa-phone" aria-hidden="true"></i></div>
                                    <span>{!! $item->phone !!}</span>
                                </li>
                                <li>
                                    <div><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    <span>{!! $item->email !!}</span>
                                </li>
                                <li>
                                    <div><i class="fa fa-globe" aria-hidden="true"></i></div>
                                    <span>{!! $item->website !!}</span>
                                </li>
                                @empty
                                <li>
                                    <div>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </div>
                                    <span>Kenya</span>
                                </li>
                                <li>
                                    <div><i class="fa fa-phone" aria-hidden="true"></i></div>
                                    <span>0123456789</span>
                                </li>
                                <li>
                                    <div><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    <span>info@example.com</span>
                                </li>
                                <li>
                                    <div><i class="fa fa-globe" aria-hidden="true"></i></div>
                                    <span>www.example.com</span>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 contact_form_col">
                    <div class="contact_form">
                        <div class="contact_title">keep in touch</div>

                        <div class="contact_form_container">
                            @if ($errors->any())
                                <div class="error-message" id='hideMe'>
                                    @foreach ($errors->all() as $error)
                                        <span style="color:#FF0000";>{{ $error }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{ route('contact.store') }}" method="POST" class="footer_form"
                                autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" name="name" id="name" class="form_input" value="{{ old('name') }}" placeholder="Your Name" required="required" />
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" name="email" id="email" class="form_input email_input" value="{{ old('email') }}" placeholder="Your Email" required="required" />
                                    </div>
                                    <div class="col-12">
                                        <textarea name="content" id="content" class="form_text" placeholder="Your Message" required="required">{{ old('content') }}</textarea>
                                        <button type="submit" class="form_submit_button">
                                            send comment
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/contact.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/contact_responsive.css') }}">
@endpush

@push('script')
    <script src="{{ asset('fronts/js/contact.js') }}"></script>
@endpush
