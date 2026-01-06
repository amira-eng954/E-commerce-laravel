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
     
      @foreach($cats as $cat)

        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->namecat}}</td>
            <td>{{$cat->body}}</td>
            <td>{{$cat->order}}</td>
            <td>
                <a href= "{{route('cats.show',$cat->id)}}"class=' btn btn-success'>show</a>
                <a href="{{route('cats.edit',$cat->id)}}"class=' btn btn-info'>edit</a>
               <form action="{{route('cats.destroy',$cat->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button  class=' btn btn-danger'>delete</button>
               </form>
            </td>
        </tr>
      @endforeach

    </table>
    <a href="{{route('cats.create')}}" class=' btn btn-info'>add Category</a>

  </div>

@endsection