@extends('layouts.layout')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <x-layouts.breadcrumb :message="'Profile'"/>

    <!-- Breadcrumb Form Section Begin -->

    <!-- profile Section Begin -->
    <div class="card text-center mr-5 ml-5 mb-5 pb-5">
        <div class="card-header">
              Profile
        </div>
        @include('includes.success')
        <div class="card-body">
            <div class='row'>
                <div class='col-md-4 col offset-md-2'>
                        <div class="card text-left">
                                <div class="card-header">
                                <h5 style="float:left;">Account Details</h5>
                                <a href="{{route('users.edit',auth()->id())}}" style="float:right; color:#E7AB3C;">Edit</a>
                                </div>
                                <div class="card-body">
                                  <h6 class="card-title ">{{ucfirst(auth()->user()->name)}}</h6>
                                  <p class="card-text mb-5">{{auth()->user()->email}}</p>
                                <a href="{{route('changePassword',auth()->id())}}" style="color:#E7AB3C;font-size:1.2rem;">Change Password</a>
                                </div>
                              </div>
                </div>
                <div class='col-md-4'>
                        <div class="card text-left">
                                <div class="card-header">
                                        <h5 style="float:left;">Address Book</h5>
                                @if($address)
                                <a href="{{route('address.edit',$address->id)}}" style="float:right;
                                color:#E7AB3C;">Edit</a>
                                @endif
                                </div>
                                <div class="card-body">
                                  <h6 class="card-title">Your default shipping address:</h6>
                                  <p class="card-text">Name: {{auth()->user()->name}}
                                    <br>
                                    Phone: {{auth()->user()->phone ?auth()->user()->phone :'' }}
                                   @if($address)
                                    <br>
                                    City: {{$address->region->city->name}}
                                    <br>
                                    Region: {{$address->region->name}}
                                    @else
                                    <br><br>
                                    <a href="{{route('address.index')}}"  class='p-2' style="color:white;
                                    background-color:#E7AB3C;">Choose Address as Default</a>
                                    @endif

                                  </p>
                                </div>
                              </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Form Section End -->
@endsection
