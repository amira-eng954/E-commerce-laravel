@extends('admin.layout')
@section('content')


 <div class=' container'>



    <h1>Create new Category</h1>

    @if ($errors->any())

        <ul class=" list-unstyled text-center fw-bold">
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger w-50 m-auto"> <li>{{ $error }}</li> </div>
            @endforeach
        </ul>
   
@endif


    <form class=' text-center' action="{{route('cats.store')}}" method='post'>
      @csrf
    <div class=' row mt-5 mb-3'>
        <label class='  col-md-2 form-label col-form-label fw-bold'>Name Category</label>
        <div class='col-md-6'>
          <input type='text' class=' form-control-lg form-control 'name='namecat' autocomplete="off" placeholder="category of name "required='required' >
        </div>
    </div>

    <div class=' row  mb-3'>
        <label class='  col-md-2 form-label col-form-label fw-bold'>description Category</label>
        <div class='col-md-6'>
                <textarea rows='5px' cols='5px' class=' form-control-lg form-control '
                name='body' autocomplete="off" placeholder="category of description" required='required'></textarea>
        </div>
    </div>


    <div class=' row  mb-3'>
        <label class='  col-md-2 form-label col-form-label fw-bold'>Order Category</label>
        <div class='col-md-6'>
          <input type='text' class=' form-control-lg form-control 'name='order' autocomplete="off" placeholder="category of order" required='required'>
    </div>

    <div class=' row'>
        
        <div class='  offset-md-2 col-md-6'>
          <input type='submit' class='btn btn-primary'  value="addcategory">
        </div>
    </div>

    </form>

 </div>

@endsection