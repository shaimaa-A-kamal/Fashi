@extends('layouts.layout')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <x-layouts.breadcrumb :message="'Register'"/>

    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                    @include('includes.success')
                    <form action="{{route('addUser')}}" method='post' enctype='multipart/form-data' >
                        @csrf
                            <div class="group-input">
                                        <label for="username">Username *</label>
                                        <input type="text" id="username" name='name' value={{old('name')}}>
                                        @error('name')
                                           <small class="text-danger">{{ $message }}</small>
                                        @enderror
                            </div>

                            <div class="group-input">
                                <label for="email">Email address *</label>
                                <input type="email" id="email" name='email' value={{old('email')}}>
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="group-input">
                                    <label for="phone">Phone </label>
                                    <input type="text" id="phone" name='phone' value={{old('phone')}}>
                                    @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                   @enderror
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name='password'>
                                @error('password')
                                <small class="text-danger">{!! $message !!}</small>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="password" id="con-pass" name='password_confirmation'>
                                @error('confirm-password')
                                <small class="text-danger">{!! $message !!}</small>
                                @enderror
                            </div>
                            <div class="group-input">
                                    <label for="gender">Choose Gender *</label>
                                    <select class="form-select sel" id='gender' name='gender' aria-label="select gender">
                                            <option></option>
                                            <option value="f" {{old('gender')=='f'? 'selected':'';}}>Female</option>
                                            <option value="m" {{old('gender')=='m'? 'selected':'';}}>Male</option>
                                     </select>
                                     @error('gender')
                                     <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="group-input">
                                    <label for="image" class="form-label">Image</label>
                                    <input class="form-control" type="file" id="image" name='image' value={{old('image')}}>
                                    @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                 @enderror
                            </div>
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{route('login')}}" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->


@endsection
