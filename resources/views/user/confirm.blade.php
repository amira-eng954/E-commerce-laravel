@extends('user.layout')


@section('css')
<link rel="stylesheet" href="{{asset('pro/css/front.css')}}">
@endsection


@section('body')
<div class='row ' >
<div class=' container product5 '>


  <form  class='text-center' action='{{url("order")}}' method='POST'>
    @csrf
    <div class='row   '>
     <label class=' col-md-2'>Name</label>
     <div class=' col-md-6'>
        <input type='text'class='mb-3 form-control'  name='name' placeholder="Name required" required>
     </div>
    </div>

    <div class='row'>
     <label class=' col-md-2'>Phone</label>
     <div class=' col-md-6'>
        <input type='text' class=' mb-3 form-control' name='phone' placeholder="phone required" required>
     </div>
    </div>

    <div class='row'>
     <label class=' col-md-2'>Email</label>
     <div class=' col-md-6'>
        <input type='email'class='mb-3 form-control'  name='email' placeholder="email required" required>
     </div>
    </div>

    <div class='row'>
     <label class=' col-md-2'>Address</label>
     <div class=' col-md-6'>
        <input type='text' class='mb-3 form-control' name='address' placeholder="address required" required>
     </div>
    </div>

    <div class='row'>
     <label class=' col-md-2'>postalCode</label>
     <div class=' col-md-6'>
        <input type='text' class='mb-3 form-control' name='code' placeholder="address required" required>
     </div>
    </div>

    <div class='row' >
     <label class=' col-md-2'>Payment</label>
     <div class='col-md-6' >
     <select name='payment' required  class=" mb-3 form-control">
        <option value='criet'>Credit card</option>
        <option value='fawry'>Fawry</option>
        <option value='visa'>Visa</option>
     </select>
     </div>
    </div>

    <div class='row'>
     
     <div class=' offset-md-2  col-md-6'>
        <input type='submit' class=' btn btn-primary' value='confirm-order'  >
     </div>
    </div>

    
  </form>
</div>
</div>

@endsection