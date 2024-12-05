
  @extends('admin.layout')
  @section('css')

    
  @endsection
@section('content')

<h1 class='  m-5 text-center'>create new member</h1>
 

<form class=" text-center " action="{{url('users')}}" method="post">
    @csrf
   
    <div class=' row'>
    <lable class=' col-md-2 col-form-label fw-bold '>Username</lable>
    <div class=' col-md-6'>
    <input type ='text' name='name'  placeholder="enter username" class=' form-control-lg  form-control  mb-3' autocomplete="off">
    @error('name')
   <div class=' alert alert-danger fw-bold '> {{$message}}</div>
    @enderror
    </div>
   
    </div>
   
    <div class=' row'>
    <lable class=' col-md-2 col-form-label fw-bold'>Email</lable>
    <div class=' col-md-6'>
    <input type ='email' name='email'  placeholder="enter email" class=' form-control-lg  form-control mb-3'>
    @error('email')
   <div class=' alert alert-danger fw-bold '> {{$message}}</div>
    @enderror
    </div>
    </div>


    <div class=' row'>
    <lable class=' col-md-2 col-form-label fw-bold'>Password</lable>
    <div class=' col-md-6'>
    <input type ='password' name='password'  placeholder="enter password" class='form-control-lg  form-control' autocomplete="new-password">
    @error('password')
   <div class=' alert alert-danger fw-bold '> {{$message}}</div>
    @enderror
    </div>
    </div>
  
    <div class=' row'>
   
    <div class=' offset-md-2 col-md-6'>
    <input type ='submit'   class=' btn btn-primary mt-4' value="add member">
    </div>
    </div>




</form>
@endsection
    
