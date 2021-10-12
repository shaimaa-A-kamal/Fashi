@extends('layouts.layout')
@section('content')

    <x-layouts.breadcrumb :message="'Verify'"/>
    <!-- verify Section Begin -->
    <div class="container mb-5 mt-5" >
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style='background-color:#E7AB3C;'>{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},

                            @if (auth('admin')->user())
                            <form class="d-inline" method="POST" action="{{route('admin.verification.resend') }}">
                          @else
                          <form class="d-inline" method="POST" action="{{route('verification.resend') }}">
                          @endif
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style='color:#E7AB3C;'>{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- verify Form Section End -->

@endsection
