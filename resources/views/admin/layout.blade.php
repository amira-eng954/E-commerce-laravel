<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
       <link rel="stylesheet" href="{{asset('pro/css/bootstrap.min.css')}}">
      <link rel='stylesheet' href='{{asset("pro/css/front.css")}}'>
      @yield('css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>
</head>
<body >
<nav class="navbar navbar-expand-lg bg-black ">
  <div class="container-fluid  ">
    <a class="navbar-brand text-white" href="#">amira</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ">
        <li class="nav-item  ">
          <a class="nav-link active text-white" aria-current="page" href="{{url('admin')}}">dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{url('product')}}">Products</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link text-white" href="{{url('users')}}">Members</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{url('cats')}}">Categories</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="{{url('adminorder')}}">Orders</a>
        </li> 
       
       </ul>
    </div>
  </div>
</nav>
    @yield('content')

 

    @yield('js')
     <script src="{{asset('pro/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html> 