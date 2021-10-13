@extends('layouts.admin.adminLayout')
@section('header')
<x-admin.layouts.header :message="'Edit City'"/>
@endsection
@section('content')
<div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Edit City</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
    <form method='post' action='{{route("cities.store")}}'>
        @csrf
        @method('PUT')
          <div class="card-body">
            <div class="form-group">
              <label for="city">City Name</label>
            <input type="text" class="form-control" id="city" placeholder="Enter City Name" name='name' value="{{$city->name}}">
              @error('name')
              <small class="text-danger">{{ $message }}</small>
             @enderror
            </div>
            <div class="form-group">
                    <label for="city">City Name</label>
                  <input type="text" class="form-control" id="city" placeholder="Enter City Name" name='name' value="{{$city->name}}">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                   @enderror
                  </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer text-center">
            <button type="submit" class="btn btn-warning">Edit City</button>
          </div>
        </form>
      </div>
@endsection
