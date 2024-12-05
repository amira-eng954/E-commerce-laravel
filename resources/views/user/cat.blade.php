@extends('user.layout')
@section('start')

<div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Offer</h4>
            <h2>New Arrivals On Sale</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2>
          </div>
        </div>
      </div>
    </div>
    @endsection

@section('body')


@section('body')




<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="{{url('redirect')}}">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          </div>
         
         
          
              
      
          <div class="row grid">
                @foreach($products as $data)
                    <div class="col-lg-4 col-md-4 all des">
                      <div class="product-item">
                        <a href='{{url("show/$data->id")}}'><img src='{{asset("storage/$data->image")}}' height="400px" alt=""  ></a>
                        <div class="down-content">
                          <a href='{{url("show/$data->id")}}'><h4>{{$data->title}}</h4></a>
                          <h6>${{$data->price}}</h6>
                          <p>{{$data->desc}}</p>
                          <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                          </ul>
                          <!-- <span>Reviews ({{$data->qun}})</span> -->
                          <form action='{{url("cart/$data->id")}}' method="post">
                            @csrf
                          <input type='number'class='mt-1' placeholder='enter quntaty' name='qun' required class=' form-control'>
                          <span><button  type='submit'><i class="  fas fa-shopping-cart  text-black fa-2x" ></i></button></span>
                         <!-- <span><button  type='submit'> <a href='{{url("cart/$data->id")}}' ><i class="  fas fa-shopping-cart  text-black fa-2x" ></i></a></button></span> -->
                           </form>
                        </div>
                      </div>
                    </div>
                    @endforeach

        </div>
        </div>
        </div>
        
      
     
 @endsection