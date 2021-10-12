@extends('layouts.layout')
@section('content')


    <!-- Breadcrumb Section Begin -->
    <x-layouts.breadcrumb :message="'AddAddress'"/>

    <!-- Breadcrumb Form Section Begin -->

    <!-- Edir Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Add Address</h2>
                        @include('includes.error')
                        <form action="{{route('address.store')}}" method='post'>
                            @csrf
                            <div class="border p-5">
                            <x-users.edit :regions='$regions' :cities='$cities' />
                            <input type="checkbox" name="defaultAddress" id ="defaultAddress" > <label for="defaultAddress"> Sign in as a default address</label>
                            </div>
                                 <button type="submit" class="site-btn register-btn mt-3">Add Address</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Form Section End -->
@endsection
