@extends('layouts.app')
@section('content')
    <div class="login">
        <div class="login-head">
            <h2>{{ __('Believers Revival Mission Church') }}</h2>
            <p>{{ __('Sign into your account') }}</p>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert" style="padding-bottom: 25px;">
                <strong>Error!</strong> The provided credentials are invalid
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- end of login-head -->
            <div class="login-credential-wrapper">
                <div class="login-input-wrapper clearfix">
                    <div class="icon-box">
                        <i class="fa-light fa-envelope"></i>
                    </div>
                    <!-- end of icon-box -->
                    <div class="input-box">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="e.g. tchalla@wakanda.com" autocomplete="email" autofocus required />
                    </div>
                    <!-- end of input-box -->
                </div>
                <!-- end of login-input-wrapper -->
            </div>
            <!-- end of login-credential-wrapper -->
            <div class="login-credential-wrapper">
                <div class="login-input-wrapper clearfix">
                    <div class="icon-box">
                        <i class="fa-light fa-lock"></i>
                    </div>
                    <!-- end of icon-box -->
                    <div class="input-box">
                        <input id="password" type="password" name="password" class="form_input" placeholder="Password" autocomplete="current-password" required />
                    </div>
                    <!-- end of input-box -->
                </div>
                <!-- end of login-input-wrapper -->
                <div class="row justify-content-between clearfix">
                    <div class="col-sm-6">
                        <input id="remember" type="checkbox" name="remember" class="form_checkbox" {{ old('remember') ? 'checked' : '' }} />
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <div class="col-sm-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-right">
                                {{ __('Forgot Password ?') }}
                            </a>
                        @endif
                    </div>
                    <!-- end of col-sm-12 -->
                </div>
                <!-- end of forget-wrapper -->
            </div>
            <!-- end of login-credential-wrapper -->
            <div class="btn-wrapper-sign">
                <button type="submit" class="btn sign-in-btn">{{ __('Sign in') }}</button>
            </div>
            <!-- end of sign-btn-wrapper -->
        </form>
    </div>
@endsection
