@extends('layouts.app')

@section('content')
    <div class="home">
        <div class="home_background" style="background-image: url({{ asset('fronts/images/events.jpg') }})"></div>
        <div class="home_content">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row align-items-center justify-content-start">
                        <div class="home_title">{{ __('Confirm Password') }}</div>
                        <div class="breadcrumbs ml-auto">
                            <ul>
                                <li><a href="{{ route('page.index') }}">{{ __('Home') }}</a></li>
                                <li>{{ __('Confirm Password') }}</li>
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
                        <div class="contact_title">{{ __('Confirm Password') }}</div>
                        <small>{{ __('Please confirm your password before continuing.') }}</small>
                        <div class="contact_form_container">
                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form_input" name="password" required autocomplete="current-password" />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-between mb-3">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-block btn-primary">
                                            {{ __('Confirm Password') }}
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
