@extends('layouts.layout')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <x-layouts.breadcrumb :message="'Profile'"/>

    <!-- Breadcrumb Form Section Begin -->

    <!-- Edir Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Edit Profile</h2>
                        <form action="{{route('users.update',$user->id)}}" method='post' enctype='multipart/form-data' >
                            @csrf
                            @method('PUT')
                            @include('includes.success')
                               <div class='text-center mb-3'>
                                    <img src='{{url("images/users/".$user->image)}}' alt='profile pictue'   width="40%;"/>
                                    <div class='mt-2'>
                                    <label for="image">Image </label>
                                    <input class="form-control" type="file" id="image" name='image' value={{old('image')}}>
                                    @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                 @enderror
                                    </div>

                                </div>
                                <div class="group-input">
                                            <label for="username">Username *</label>
                                            <input type="text" id="username" name='name' value={{$user->name}}>
                                            @error('name')
                                               <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                </div>

                                <div class="group-input">
                                    <label for="email">Email address *</label>
                                    <input type="email" id="email" name='email' value={{$user->email}}>
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="group-input">
                                        <label for="phone">Phone </label>
                                        <input type="text" id="phone" name='phone' value={{$user->phone}}>
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
                                                <option value="f" {{$user->gender=='Female'? 'selected':'';}}>Female</option>
                                                <option value="m" {{$user->gender=='Male'? 'selected':'';}}>Male</option>
                                         </select>
                                         @error('gender')
                                         <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                                <button type="submit" class="site-btn register-btn">Update</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Form Section End -->


@endsection
