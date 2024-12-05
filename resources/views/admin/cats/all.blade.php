@extends('admin.layout')
@section('content')

  <div class=' container'>
  <h1>ALL Categories</h1>
  @if(session()->has('suc'))
  <div class=' alert alert-success'> {{ session()->get('suc')}}</div>
  @endif
    
    <table class=' table  text-center  table-bordered'>
      <tr>
        <th> #ID</th>
        <th>Name_Cat</th>
        <th>Description</th>
        <th> Order</th>
        <th> Control</th>
      </tr>
     
      @foreach($data as $d)

        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->namecat}}</td>
            <td>{{$d->body}}</td>
            <td>{{$d->order}}</td>
            <td>
                <a href="{{url("cats/$d->id")}}" class=' btn btn-success'>show</a>
                <a href="{{url("cats/edit/$d->id")}}" class=' btn btn-info'>edit</a>
                <a href="{{url("cats/delete/$d->id")}}" class=' btn btn-danger'>delete</a>
            </td>
        </tr>
      @endforeach

    </table>
    <a href="{{url('cat/create')}}" class=' btn btn-info'>add Category</a>

  </div>

@endsection