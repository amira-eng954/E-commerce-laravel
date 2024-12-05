
@extends('admin.layout')
  @section('css')

    
  @endsection
@section('content')
<h1 class='  m-5 text-center'>edit member</h1>
@if ($errors->any())

<ul class=" list-unstyled text-center fw-bold">
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger w-50 m-auto"> <li>{{ $error }}</li> </div>
    @endforeach
</ul>

@endif

<form class=" text-center " action="{{url("users/$data->id")}}" method="post">
    @csrf
    @method('put')
    
    <div class=' row'>
    <lable class=' col-md-2 col-form-label fw-bold '>Username</lable>
    <div class=' col-md-6'>
    <input type ='text' name='name' value="{{$data->name}}" class=' form-control-lg  form-control  mb-3' autocomplete="off">
    </div>
    </div>
   
    <div class=' row'>
    <lable class=' col-md-2 col-form-label fw-bold'>Email</lable>
    <div class=' col-md-6'>
    <input type ='email' name='email'   value="{{$data->email}}" class=' form-control-lg  form-control mb-3'>
    </div>
    </div>


    <div class=' row'>
    <lable class=' col-md-2 col-form-label fw-bold'>Password</lable>
    <div class=' col-md-6'>
    <input type ='password' name='password'   class='form-control-lg  form-control' autocomplete="new-password">
    </div>
    </div>
  
    <div class=' row'>
   
    <div class=' offset-md-2 col-md-6'>
    <input type ='submit'   class=' btn btn-primary mt-4' value="update member">
    </div>
    </div>




</form>
@endsection
    
