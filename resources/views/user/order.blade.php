@extends('user.layout')

@section('css')
<link rel="stylesheet" href="{{asset('pro/css/front.css')}}">
@endsection


@section('body')

<div class=' container'>

<div class=' row '>

<div class='product5'>
    <h1> My Orders</h1>
@if(session()->has('suc'))
       <div class=' alert alert-success'> {{session()->get('suc')}}</div>
        @endif

<table class='text-center table  table-bordered '>

    <tr class=' mt-5'>
        
        <th>image</th>
        <th>title</th>
        <th>price</th>
        <th>Quntaty</th>
        <th>total price</th>
        <th>Status </th>
        
    </tr>
   
    @foreach($data as $ii)
  
<tr>
<?php
         $ss=$ii->product->image;
        
       ?>

<td><img src='{{asset("storage/$ss")}}'  height="80px" width="80px"></td>
    <td>{{$ii->product->title}}</td>
    <td>{{$ii->product->price}}</td>
    <td>{{$ii->qun}}</td>
    <?php
      $ss=$ii->product->price*$ii->qun;
    ?>
    <td>{{$ss}}</td>
    <td>

    <?php
        if($ii->order->status =='failed')
{
        echo"<p class=' btn btn-danger'>".$ii->order->status."</p>";
}
        elseif($ii->order->status =='Delivered'){
            echo"<p class=' btn btn-success'>".$ii->order->status."</p>";
        }
        else{
            echo"<p class=' btn btn-info'>".$ii->order->status."</p>";
        }
       
        ?>
    </td>
 
</tr>

    @endforeach
   
</table>
</div>
</div>
</div>

@endsection