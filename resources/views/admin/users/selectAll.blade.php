@extends('admin.layout')
@section('content')


<div class=' container'>
<h1> ALL Users </h1>
@if(session()->has('suc'))
<div class=' alert alert-success'> 
 {{session()->get('suc')}}
 </div>
  @endif
<table class=' table table-bordered text-center'>
   <tr>
      <th>#ID</th>
      <th>Name </th>
      <th>Email</th>

      <th>control</th>
   </tr>


@foreach($users as $user)
<tr>
  <td>{{$user->id}}</td>
 <td> {{$user->name}}</td>
 <td> {{$user->email}}</td>
 <td>
   <a href="{{route('users.show',$user->id)}}" class=' btn btn-success'>show</a>
   <a href="{{route('users.edit',$user->id)}}" class=' btn btn-info'>edit</a>
   


    <form action="{{route('users.destroy',$user->id)}}" method='post'>
       @csrf
       @method('delete')
       
      <input type='submit' class=' btn btn-danger d-inline' value="delete"> 
   </form> 
   
</td>
</tr>
@endforeach
</table>
<a href="{{route('users.create')}}" class=" btn btn-primary">add new member</a>
</div>
@endsection