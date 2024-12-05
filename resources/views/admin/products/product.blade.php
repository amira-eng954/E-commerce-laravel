@extends('admin.layout')
@section('content')

 
<h1>ALL Products</h1>




  <div class=' container'>

  @if(session()->has('suc'))
    <div class='alert alert-success'>{{session()->get('suc')}}</div>
@endif
<a href='{{url("pro/create")}}' class=' mb-5 btn btn-primary'> add product</a>
    <table class=' text-center table table-bordered'>
      <tr>
        <th>#id</th>
        <th>title</th>
        <th>descripton</th>
        <th>quntaty</th>
        <th>#price</th>
        <th>#imge</th>
        <th>Category</th>
        <th>username</th>
        <th>control</th>
      </tr>

      @foreach($data as $pro)
      <tr>
           <td>{{$pro->id}}</td>
           <td>{{$pro->title}}</td>
           <td>{{$pro->desc}}</td>
           <td>{{$pro->qun}}</td>
           <td>{{$pro->price}}</td>
           <td><img src='{{asset("storage/$pro->image")}}' width="80px" height="80px"></td>
           <td>{{$pro->cat->namecat}}</td>
           <td>{{$pro->user->name}}</td>
           <td>
            <a class='btn btn-success' href='{{url("product/$pro->id")}}'> show</a>
            <a class='btn btn-info'  href='{{url("product/edit/$pro->id")}}'> edit</a>
            <a class=' btn btn-danger'  href='{{url("product/delete/$pro->id")}}'>delete</a>

           </td>
      </tr>
      @endforeach

    </table>
  </div>

 
@endsection  