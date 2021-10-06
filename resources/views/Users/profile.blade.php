@extends('layouts.layout')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <x-layouts.breadcrumb :message="'Profile'"/>

    <!-- Breadcrumb Form Section Begin -->

    <!-- profile Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Profile</h2>
                    <form>
                           <div class='text-center mb-3'>
                               <img src='{{url("images/users/".$user->image)}}' alt='profile pictue'  class='rounded' width="40%;"/>
                               </div>
                            <div class="group-input text-center">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" name='name' value='{{$user->name}}'>
                            </div>

                            <div class="group-input text-center">
                                <label for="email">Email address</label>
                                <input type="email" id="email" name='email' value='{{$user->email}}'>
                            </div>
                            <div class="group-input text-center">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" name='phone' value='{{$user->phone}}'>
                            </div>
                            <div class="group-input text-center">
                                    <label for="gender">Gender</label>
                                    <input type="text" id="gender" name='gender' value='{{$user->gender}}'>
                            </div>
                            @forelse($user->address as $address)
                                <div class="group-input text-center">
                                    <label for="{{'Address'.$loop->iteration}}">{{'Address'.$loop->iteration}}</label>
                                    <input type="text" id="{{'Address'.$loop->iteration}}" name='{{'Address'.$loop->iteration}}' value='{{$address}}'>
                                </div>
                            @empty
                            <div class="group-input text-center">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name='address' value=''>
                                </div>
                            @endforelse
                            <div class='text-center'>
                            <a  class="site-btn register-btn" href="{{route('users.edit',$user->id)}}">Edit</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Form Section End -->


@endsection
