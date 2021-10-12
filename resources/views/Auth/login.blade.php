@extends('layouts.layout')
@section('content')

    <x-layouts.breadcrumb :message="'Login'"/>
    <!-- Login Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                     @include('includes.success')
                    <form action="{{route('AttemptLogin')}}" method='post'>
                        @csrf
                            <div class="group-input">
                                <label for="email">Email address *</label>
                            <input type="email" id="email" name='email' value='{{old("email")}}'>
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name='password'>
                                @error('password')
                                <small class="text-danger">{{$message }}</small>
                                @enderror
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass"  name='remember'>
                                        <span class="checkmark"></span>
                                    </label>
                                <a href="{{route('password.request')}}" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{route('register')}}" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Form Section End -->

@endsection
