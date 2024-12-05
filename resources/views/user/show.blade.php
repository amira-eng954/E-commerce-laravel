
@extends('user.layout')


@section('css')
<link rel="stylesheet" href="{{asset('pro/css/front.css')}}">
@endsection


@section('body')
  
<!-- <h1> show  {{$data->title}}</h1> -->
<div class=' container '>
    <div class='row '>
        <div class='col-md-3 product5'>
            <img src='{{asset("storage/$data->image")}}' width="300px" height="300px">
        </div>
        <div class="col-md-3">
           <ul class=' list-unstyled fw-bold   product5  '>
               <li class='mb-3  w-8'> <span> #ID :</span> {{$data->id}}</li>
               <li  class='mb-3'>  <span> Title :</span> {{$data->title}}</li>
               <li  class='mb-3'>  <span> Description :</span> {{$data->desc}}</li>
               <li class='mb-3'>  <span> Quntaty :</span> {{$data->qun}}</li>
               <li  class='mb-3'>  <span> Price :</span> ${{$data->price}}</li>
               <li  class='mb-3'>  <span > Category :</span> <a class=' text-danger' href='{{url("cat/$data->cat_id")}}'>{{$data->cat->namecat}}</a></li>
               <li  class='mb-3'>  <span> username :</span> {{$data->user->name}}</li>
             </ul>
          

        </div>
       
        <div class=' offset-2 col-md-4 product5'>
             <form action='{{url("cart/$data->id")}}' method="post">
                            @csrf
                            <p class='lead mt-5 mb-3'>
                                you can shopping but you must enter number quntaty
                            </p>
                          <input type='number'class='mt-1' placeholder='enter quntaty' name='qun' required class=' form-control '><br>
                          <button  type='submit'><i class="  mt-2 fas fa-shopping-cart  text-black fa-2x" ></i></button>
                         <!-- <span><button  type='submit'> <a href='{{url("cart/$data->id")}}' ><i class="  fas fa-shopping-cart  text-black fa-2x" ></i></a></button></span> -->
                           </form>
          </div>
</div>

</div>

@endsection 
