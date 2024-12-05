@extends('admin.layout')
@section('content')


 <div class=' container'>

    <h1>Edit Category</h1>
    
    @if ($errors->any())

        <ul class=" list-unstyled text-center fw-bold">
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger w-50 m-auto"> <li>{{ $error }}</li> </div>
            @endforeach
        </ul>
   
@endif

   
    <form class=' text-center' action="{{url("cats/$data->id")}}"method='post'>
      @csrf
      @method('put')
    <div class=' row mt-5 mb-3'>
        <label class='  col-md-2 form-label col-form-label fw-bold'>Name Category</label>
        <div class=' col-md-6'>
          <input type='text' value="{{$data->namecat}}"class='  form-control form-control-lg'name='namecat' autocomplete="off"  required='required'>
        </div>
    </div>

    <div class=' row mb-3'>
        <label class='  col-md-2 form-label col-form-label fw-bold'>description Category</label>
        <div class=' col-md-6'>
          <textarea rows='5px' cols='5px' class='  form-control form-control-lg' name='body' autocomplete="off"  required='required'>{{$data->body}}</textarea>
        </div>
    </div>


    <div class=' row mb-3'>
        <label class='  col-md-2 form-label col-form-label fw-bold'>Order Category</label>
        <div class=' col-md-6'>
          <input type='text' value="{{$data->order}}" class='form-control form-control-lg'name='order' autocomplete="off" placeholder="category of order" required='required'>
        </div>
    </div>

    <div class=' row'>
        
        <div class='  offset-md-2 col-md-6'>
          <input type='submit' class='  btn btn-primary 'value="updatCategory">
        </div>
    </div>

    </form>

 </div>

@endsection