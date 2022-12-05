@extends('layouts.app')

@section('content')
    <div class="home">
        <div class="home_background" style="background-image: url({{ asset('fronts/images/events.jpg') }})"></div>
        <div class="home_content">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row align-items-center justify-content-start">
                        <div class="home_title">{{ __('Verify Email') }}</div>
                        <div class="breadcrumbs ml-auto">
                            <ul>
                                <li><a href="{{ route('page.index') }}">{{ __('Home') }}</a></li>
                                <li>{{ __('Verify Email') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="contact_form">
                        <div class="contact_title">{{ __('Verify Your Email Address.') }}</div>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <div class="contact_form_container">
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-block btn-primary">
                                            {{ __('click here to request another') }}
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
