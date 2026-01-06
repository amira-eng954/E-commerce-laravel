@extends('admin.layout')
@section('content')

 
<h1>ALL Products</h1>




  <div class=' container'>

  @if(session()->has('suc'))
    <div class='alert alert-success'>{{session()->get('suc')}}</div>
@endif
<a href="{{route('product.create')}}" class=' mb-5 btn btn-primary'> add product</a>
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

      @foreach($products as $pro)
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
            <a class='btn btn-success' href="{{route('product.show',$pro->id)}}"> show</a>
            <a class='btn btn-info'  href="{{route('product.edit',$pro->id)}}"> edit</a>
           
             <form action= "{{route('product.destroy',$pro->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button  class=' btn btn-danger'>delete</button>
               </form>
           </td>
      </tr>
      @endforeach

    </table>
    {{ $products->links() }}
  </div>

 
@endsection  