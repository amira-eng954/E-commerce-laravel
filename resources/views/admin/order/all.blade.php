@extends('admin.layout')
@section('content')
<h1>All orders</h1>
<div class=' container mt-5'>
    @if(session()->has('suc'))
    <div class=' alert alert-success'>{{session()->get('suc')}}</div>
    @endif
<div class=' container'>
<div class=' row '>
    
<table class=' table  table-bordered '>
    <tr class=' mt-5'>
        
        <th>image</th>
        <th>username</th>
        <th>title</th>
        <th>price</th>
        <th>Quntaty</th>
        <th>Status </th>
        <th>control </th>
        
    </tr>
   
    @foreach($data as $ii)
  
<tr>
<?php
$dd=$ii->product->image;
?>
<td><img src='{{asset("storage/$dd")}}' width="100px" height="100px"></td>
    <td>{{$ii->user->name}}</td>
    <td>{{$ii->product->title}}</td>
    <td>{{$ii->product->price}}</td>
    <td>{{$ii->qun}}</td>
    <td >
        <?php
        if($ii->order->status =='failed')
{
        echo"<p class=' alert alert-danger'>".$ii->order->status."</p>";
}
        elseif($ii->order->status =='Delivered'){
            echo"<p class=' alert alert-success'>".$ii->order->status."</p>";
        }
        else{
            echo"<p class=' alert alert-info'>".$ii->order->status."</p>";
        }
       
        ?>
    </td>
    <td>
        <a class=' btn btn-info' href='{{url("order_update/$ii->order_id")}}'><i class=' fas fa-edit'></i>edit</a>
        <a class=' btn btn-danger' href='{{url("order_delete/$ii->order_id")}}'><i class=' fas fa-close'></i>delete</a>
    </td>
 
</tr>

    @endforeach
   
</table>
</div>
</div>
@endsection