@extends('layouts.layout')
@section('content')


    <!-- Breadcrumb Section Begin -->
    <x-layouts.breadcrumb :message="'changePassword'"/>

    <!-- Breadcrumb Form Section Begin -->

    <!-- Edir Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Change Password</h2>
                        @include('includes.error')
                        <form action="{{route('updatePassword',$user->id)}}" method='post'>
                            @csrf
                            @method('PUT')
                            <div class="group-input">
                                    <label for="currentpass">Current Passowrd *</label>
                                    <input type="password" id="currentpass" name='currentpass'>
                                    @error('currentpass')
                                    <small class="text-danger">{!! $message !!}</small>
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

                                 <button type="submit" class="site-btn register-btn mt-3">Update</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Form Section End -->
@endsection
