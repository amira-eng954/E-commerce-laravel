@extends('admin.layout')
@section('content')
<h1>Edit order</h1>
<div class=' container '>
@if($errors->any())
@foreach($errors->all() as $error)
{{$error}}
@endforeach
@endif


<form  action='{{url("order/$data->id")}}' method="post" enctype="multipart/form-data">
    @csrf
   @method('put')
    <div class=' row class=" text-center "'>
    <lable class=' col-md-2 col-form-label fw-bold '>name</lable>
    <div class=' col-md-6'>
    <input type ='text' name='name' value='{{$data->name}} ' class=' form-control-lg  form-control  mb-3' autocomplete="off">
    </div>
    </div>
   
    <div class=' row class=" text-center "'>
    <lable class=' col-md-2 col-form-label fw-bold'>address</lable>
    <div class=' col-md-6'>
    <textarea type ='text' name='address'cols='5px' rows="5px" class=' form-control-lg  form-control mb-3'>{{$data->address}}</textarea>
    </div>
    </div>

    <div class=' row class=" text-center "'>
    <lable class=' col-md-2 col-form-label fw-bold'>email</lable>
    <div class=' col-md-6'>
    <input type ='email' name='email' value='{{$data->email}} '  class=' form-control-lg  form-control mb-3'>
    </div>
    </div>

    <div class=' row class=" text-center "'>
    <lable class=' col-md-2 col-form-label fw-bold'>phone</lable>
    <div class=' col-md-6'>
    <input type ='text' name='phone' value='{{$data->phone}} '  class=' form-control-lg  form-control mb-3'>
    </div>
    </div>

    <div class=' row class=" text-center "'>
    <lable class=' col-md-2 col-form-label fw-bold'>code</lable>
    <div class=' col-md-6'>
    <input type ='text' name='code' value='{{$data->code}} '  class=' form-control-lg  form-control mb-3'>
    </div>
    </div>

    <div class=' row class=" text-center "'>
    <lable class=' col-md-2 col-form-label fw-bold'>payment</lable>
    <div class=' col-md-6'>
    <input type ='text' name='payment' value='{{$data->payment}} '  class=' form-control-lg  form-control mb-3'>
    </div>
    </div>


    <div class='row mb-3'>
        <lable class=' col-md-2 col-form-label text-center fw-bold'>Status</lable>
        <div class=' col-md-6'>
            <select name='status' class=' form-control-lg  form-control mb-3'>
               
               <option value="pending" @if( $data->stutus=='pending') selected @endif > pending</option>
               <option value="processing" @if( $data->stutus=='processing') selected @endif > processing</option>
               <option value="completed" @if( $data->stutus=='completed') selected @endif > completed</option>
               <option value="cancelled" @if( $data->stutus=='cancelled') selected @endif > cancelled</option>
               <option value="Delivered" @if( $data->stutus=='Delivered') selected @endif > Delivered</option>
               <option value="failed" @if( $data->stutus=='failed') selected @endif >failed</option>
         
            </select>
        </div>
    </div>

    <div class='row mb-3'>
        <lable class=' col-md-2 col-form-label text-center  fw-bold'>Username</lable>
        <div class=' col-md-6'>
            <select name='user_id' class=' form-control-lg  form-control mb-3'>
                @foreach($users as $user)
               <option  @if( $user->id == $data->user_id)selected @endif value="{{$user->id}}"> {{$user->name}}</option>
                @endforeach
            </select>
          
        </div>
    </div>
    
   
    <div class=' row'>
   
    <div class=' offset-md-2 col-md-6'>
    <input type ='submit'   class=' btn btn-primary mt-4' value="edit order">
    </div>
    </div>




</form>
</div>


@endsection
    

