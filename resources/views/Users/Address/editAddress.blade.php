@extends('layouts.layout')
@section('content')


    <!-- Breadcrumb Section Begin -->
    <x-layouts.breadcrumb :message="'EditAddress'"/>

    <!-- Breadcrumb Form Section Begin -->

    <!-- Edir Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Edit Address</h2>
                        @include('includes.error')
                        <form action="{{route('address.update',$address->id)}}" method='post'>
                            @csrf
                            @method('PUT')
                            <div class="border p-5">
                            <x-users.edit :regions='$regions' :cities='$cities' :floor='$address->floor' :flat='$address->flat' :building='$address->building' :street='$address->street'
                                    :addressRegionId='$address->region->id' :addressCityId='$address->region->city->id'  :id='$address->id' />
                            {!!$address->defaultAddress ? '': '<input type="checkbox" name="defaultAddress" id ="defaultAddress"> <label for="defaultAddress"> Sign in as a default address</label>'!!}
                            </div>
                                 <button type="submit" class="site-btn register-btn mt-3">Update Address</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Form Section End -->
@endsection
