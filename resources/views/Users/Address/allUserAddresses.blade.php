@extends('layouts.layout')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <x-layouts.breadcrumb :message="'UserAddresses'"/>

    <!-- Breadcrumb Form Section Begin -->

    <!-- profile Section Begin -->
    <div class='show alert alert-success mx-auto m-3 text-center' style='display:none;'>Address has be deleted successfully</div>
    <div class='error alert alert-danger mx-auto m-3 text-center' style='display:none;'>Something went Wrong</div>
    <div class="card text-center mr-5 ml-5 mb-5 pb-5">
        <div class="card-header">
           <h4 style="float:left;">  Addresses </h4>
           <a href='{{route("address.create")}}' style='background-color:#E7AB3C;float:right; color:white;' class='p-2'>Add New Address</a>
        </div>
        <div class="card-body">
            <div class='row'>
                @foreach($addresses as $address)
            <div class='col-md-4 col' id='{{"Address".$address->id}}'>
                        <div class="card text-left mb-3">
                                <div class="card-body">
                                  <h6 class="card-title ">{{ucfirst(auth()->user()->name)}}</h6>
                                <p class="card-text mb-1">
                                {{$address->street}} Street
                                <br>
                                {{$address->region->name}},{{$address->region->city->name}}
                                <br>
                                {{auth()->user()->phone}}
                                <br>
                                {!!$address->defaultAddress ? "<span style='color:#E7AB3C;'>Default Address</span>":"<br>" !!}
                                </p>
                                </div>
                                <div class="card-footer">
                                {!!$address->defaultAddress ? "<span style='color:#aaa;float:left;'>SET AS Default</span>": "<a href='".route('address.show',$address->id)."'  style='color:#E7AB3C;float:left;'>SET AS Default</a>" !!}
                                <a href="{{route('address.edit',$address->id)}}" style="float:right;color:#E7AB3C;">Edit</a>
                                {!! $address->defaultAddress ? "": "<a href='".route("address.destroy",$address->id)."' class='deleteAddress' data-id='$address->id' style='color:#E7AB3C;margin-right:10px;float:right;'>Delete</a>" !!}

                                      </div>
                              </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Profile Form Section End -->
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

$(".deleteAddress").click(function(e){
   e.preventDefault();
   var id = $(this).data("id");
   var url=e.target;
   var link=url.getAttribute('href');

   $.ajax(
       {
         url:link,
         type: 'DELETE',
         data: {
          '_token': '{{csrf_token()}}'
       },
       success: function (response){
        $("#Address"+id).remove();
        $(".show").show();

       },  error: function (reject){
       $(".error").show();
     }
    });
  });
});
</script>
@endsection
