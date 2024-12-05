@extends('admin.layout')
  
@section('content')
<h1> show  </h1>
<div class=' container'>
    <div class='row'>
        <div class=' col-md-3'>
            <img src='{{asset("storage/$data->image")}}' width="300px" height="300px">
        </div>
        <div class="col-md-6">
           <ul class=' list-unstyled fw-bold  list-user mt-5'>
               <li> <span> #ID :</span>{{$data->id}}</li>
               <li>   <span> title:</span> {{$data->title}}</li>
               <li>  <span> body :</span>{{$data->desc}}</li>
               <li>  <span> price :</span>{{$data->price}}</li>
               <li>  <span> qun :</span>{{$data->qun}}</li>
             </ul>
        </div>
</div>
</div>
@endsection