@extends('vendor.layouts')
@section('content')
<h1>Add Product</h1>
<div class=' container mt-5'>

  @if($errors->any())
  @foreach($errors->all() as $error)
  <div class='alert alert-danger'>{{$error}}</div>
  @endforeach
  @endif

<form class=" text-center " action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
    @csrf
   
    <div class=' row'>
    <lable class=' col-md-2 col-form-label fw-bold '>title</lable>
    <div class=' col-md-6'>
    <input type ='text' name='title'  placeholder="enter title" class=' form-control-lg  form-control  mb-3' autocomplete="off">
    </div>
    </div>
   
    <div class=' row'>
    <lable class=' col-md-2 col-form-label fw-bold'>Description</lable>
    <div class=' col-md-6'>
    <textarea type ='text' name='desc'cols='5px' rows="5px"  placeholder="enter description" class=' form-control-lg  form-control mb-3'></textarea>
    </div>
    </div>

    <div class=' row'>
    <lable class=' col-md-2 col-form-label fw-bold'>Quntaty</lable>
    <div class=' col-md-6'>
    <input type ='text' name='qun'  placeholder="enter Quntaty" class=' form-control-lg  form-control mb-3'>
    </div>
    </div>

    <div class=' row'>
    <lable class=' col-md-2 col-form-label fw-bold'>price</lable>
    <div class=' col-md-6'>
    <input type ='number' name='price'  placeholder="enter price" class=' form-control-lg  form-control mb-3'>
    </div>
    </div>
    
    
    <div class='row mb-3'>
        <lable class=' col-md-2 col-form-label text-center fw-bold'>Category</lable>
        <div class=' col-md-6'>
            <select name='cat_id' class=' form-control-lg  form-control mb-3'>
                @foreach($cats as $cat)
               <option value="{{$cat->id}}"  > 
                {{$cat->namecat}}</option>

                @endforeach
         
            </select>
        </div>
    </div>

    
    

    <div class=' row'>
    <lable class=' col-md-2 col-form-label fw-bold'>Image</lable>
    <div class=' col-md-6'>
    <input type ='file' name='image'  class=' form-control-lg  form-control mb-3'>
    </div>
    </div>



    
  
    <div class=' row'>
   
    <div class=' offset-md-2 col-md-6'>
    <input type ='submit'   class=' btn btn-primary mt-4' value="add product">
    </div>
    </div>




</form>
@endsection
    
