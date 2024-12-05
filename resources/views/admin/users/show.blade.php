@extends('admin.layout')
  
@section('content')
<h1> show  {{$data->name}}</h1>
<div class=' container'>
    <div class='row'>
        <div class=' col-md-3'>
        </div>
        <div class="col-md-6">
           <ul class=' list-unstyled fw-bold  list-user mt-5'>
               <li> <span> #ID :</span>{{$data->id}}</li>
               <li>   <span> name :</span> {{$data->name}}</li>
               <li>  <span> email :</span>{{$data->email}}</li>
             </ul>
        </div>
</div>
</div>
@endsection