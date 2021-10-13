@extends('layouts.admin.adminLayout')
@section('header')
<x-admin.layouts.header :message="'All Cities'"/>
@endsection
@section('content')
@include('includes.success')
<div class="card">
          @if(!$cities)
          <div  class='text-center  text-warning m-5'>There is no Cities </div>
          @else
          <div class="card-header">
                <h3 class="card-title">All Cities</h3>
          <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr class='text-center' >
                    <th style="width: 2%">#</th>
                    <th  style="width: 50%">City Name</th>
                    <th style="width: 10%">Label</th>
                    <th style="width: 35%">Actions</th>

                  </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                  <tr class='text-center'>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$city['name']}}</td>
                    <td><span class=" text-{{$city['status']?'success' :'danger%' }}">{{$city['status']?'Active' :'Not Active' }}</span></td>
                    <td>
                    <a href= '{{route("cities.edit",$city["id"])}}'  class='btn btn-success'>Edit</a>
                    <a href= '{{route("cities.destroy",$city["id"])}}' class='btn btn-danger'>Delete</a>
                    </td
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          @endif


        <!-- /.card-body -->
</div>
@endsection
