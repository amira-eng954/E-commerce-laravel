@extends('user.layout')


@section('css')
<link rel="stylesheet" href="{{asset('pro/css/front.css')}}">
@endsection


@section('body')
<div class=' container'>
<div class=' row '>
    <div class='product5'>
        @if(session()->has('suc'))
       <div class=' alert alert-success'> {{session()->get('suc')}}</div>
        @endif
<a href='{{url("/redirect")}}' class='mb-4 btn btn-success '>back shopping</a>
<table class=' table  table-bordered  '>
    <tr class=' mt-5'>
        
        <th>image</th>
        <th>title</th>
        <th>price</th>
        <th>Quntaty</th>
        <th>Totle1 price </th>
        <th>cancel</th>
    </tr>
    <tr>
    <?php
          $xx=0;
          $total=0
        ?>
        @foreach($data as $datas)
       <?php
         $ss=$datas->product->image;
         
       ?>
       <td><img src='{{asset("storage/$ss")}}' height="80px" width="80px"></td>
        <td>{{$datas->product->title}}</td>
        <td>{{$datas->product->price}}</td>
        <td>{{$datas->qun}}</td>
       
        <?php

        // $xx=$xx+ $data->price
        $xx=$datas->product->price *$datas->qun
        ?>
        <td>{{$xx}}</td>
        <td><a href='{{url("cart/$datas->id")}}' class=' btn btn-danger'>delete order</a></td>
        <?php
       $total=$total+$xx;
       ?>

    </tr>
    @endforeach
   
   
</table>



</div>   

</div>  
<h5 class='fw-bold mb-3'>Total : {{$total}}</h5>

<a href='{{url("cart/")}}' class=' btn btn-primary '>confirm order</a>  
</div> 

@endsection
