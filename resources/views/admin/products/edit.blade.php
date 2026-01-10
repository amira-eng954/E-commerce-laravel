@extends('admin.layout')
@section('content')
<h1>Edit Product</h1>
<div class=' container mt-5'>
    
@if($errors->any())
  @foreach($errors->all() as $error)
  <div class='alert alert-danger'>{{$error}}</div>
  @endforeach
  @endif

<form  action="{{ route('product.update',$data->id)}}" method="post" enctype="multipart/form-data">
    @csrf
   @method('put')
    <div class=' row class=" text-center "'>
    <lable class=' col-md-2 col-form-label fw-bold '>title</lable>
    <div class=' col-md-6'>
    <input type ='text' name='title' value='{{$data->title}} ' class=' form-control-lg  form-control  mb-3' autocomplete="off">
    </div>
    </div>
   
    <div class=' row class=" text-center "'>
    <lable class=' col-md-2 col-form-label fw-bold'>Description</lable>
    <div class=' col-md-6'>
    <textarea type ='text' name='desc'cols='5px' rows="5px" class=' form-control-lg  form-control mb-3'>{{$data->desc}}</textarea>
    </div>
    </div>

    <div class=' row class=" text-center "'>
    <lable class=' col-md-2 col-form-label fw-bold'>Quntaty</lable>
    <div class=' col-md-6'>
    <input type ='text' name='qun' value='{{$data->qun}} '  class=' form-control-lg  form-control mb-3'>
    </div>
    </div>

    <div class=' row class=" text-center "'>
    <lable class=' col-md-2 col-form-label fw-bold'>price</lable>
    <div class=' col-md-6'>
    <input type ='text' name='price' value='{{$data->price}} '  class=' form-control-lg  form-control mb-3'>
    </div>
    </div>

    <div class='row mb-3'>
        <lable class=' col-md-2 col-form-label text-center fw-bold'>Category</lable>
        <div class=' col-md-6'>
            <select name='cat_id' class=' form-control-lg  form-control mb-3'>
                @foreach($cats as $cat)
               <option value="{{$cat->id}}"  @if( $cat->id == $data->cat_id) selected @endif > 
                {{$cat->namecat}}</option>

                @endforeach
         
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
    <lable class='   col-md-2 col-form-label fw-bold'>Status</lable>
    <div class='  col-md-6'>
    <select  name='status' class='form-control-lg mt-3 mb-4  form-control' autocomplete="new-password">
    <option>select status</option>
   <option value="active" @selected($data->status =='active')>Active</optin>
   <option value="inactive" @selected($data->status =='inactive') >Inactive</option>
  
    </div>
    </div>
    
    

    <div class=' row'>
    <lable class=' col-md-2 col-form-label text-center  fw-bold'>Image</lable>
    <div class=' col-md-6'>
    <input type ='file' name='image'  class=' form-control-lg  form-control mb-3'>
    <img src='{{asset("storage/$data->image")}}'width='100px' height="100px">
    </div>
    </div>



    
  
    <div class=' row'>
   
    <div class=' offset-md-2 col-md-6'>
    <input type ='submit'   class=' btn btn-primary mt-4' value="edit product">
    </div>
    </div>




</form>
@endsection
    
