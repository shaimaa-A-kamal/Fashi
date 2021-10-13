@extends('layouts.admin.adminLayout')
@section('header')
<x-admin.layouts.header :message="'Create City'"/>
@endsection
@section('content')
<div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Create City</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
    <form method='post' action='{{route("cities.store")}}'>
        @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="city">City Name</label>
              <input type="text" class="form-control" id="city" placeholder="Enter City Name" name='name'>
              @error('name')
              <small class="text-danger">{{ $message }}</small>
             @enderror
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer text-center">
            <button type="submit" class="btn btn-warning">Add City</button>
          </div>
        </form>
      </div>
@endsection
