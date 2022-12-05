@extends('layouts.app')
@section('content')
    <div class="login">
        <div class="login-head" style="padding-bottom: 25px;">
            <h2>{{ __('Forgot Your Password?') }}</h2>
            <small>{{ __('That\'s no fun. Enter your email and we\'ll send you instructions to reset your password.') }}</small>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert" style="padding-bottom: 25px;">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <!-- end of login-head -->
            <div class="login-credential-wrapper">
                <div class="login-input-wrapper clearfix">
                    <div class="icon-box">
                        <i class="fa-light fa-envelope"></i>
                    </div>
                    <!-- end of icon-box -->
                    <div class="input-box">
                        <input id="email" type="email" name="email" class="form_input" value="{{ old('email') }}" placeholder="e.g. tchalla@wakanda.com" autocomplete="email" autofocus required />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- end of input-box -->
                </div>
                <!-- end of login-input-wrapper -->
            </div>
            <!-- end of login-credential-wrapper -->
            <div class="btn-wrapper-sign">
                <button type="submit" class="btn sign-in-btn">{{ __('Send Password Reset Link') }}</button>
            </div>
            <!-- end of sign-btn-wrapper -->
        </form>
    </div>
@endsection
