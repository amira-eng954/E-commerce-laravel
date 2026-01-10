@extends('admin.layout')
  
@section('content')
<h1> show  {{$data->title}}</h1>
<div class=' container'>
    <div class='row mt-5'>
        <div class='col-md-3'>
            <img src='{{asset("storage/$data->image")}}' width="300px" height="300px">
        </div>
        <div class="col-md-6">
           <ul class=' list-unstyled fw-bold  list-user '>
               <li> <span> #ID :</span>{{$data->id}}</li>
               <li>   <span> Title :</span> {{$data->title}}</li>
               <li>  <span> Description :</span>{{$data->desc}}</li>
               <li>  <span> Quntaty :</span>{{$data->qun}}</li>
               <li>  <span> Price :</span>{{$data->price}}</li>
                 <li>  <span> category :</span>{{$data->cat->namecat}}</li>
             </ul>
        </div>
</div>
</div>
@endsection