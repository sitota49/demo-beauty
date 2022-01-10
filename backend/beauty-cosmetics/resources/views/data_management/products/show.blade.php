@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{$product->product_name}}</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.index') }}">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product Details</li>
      </ol>
    </div>
   
    <div>
        <div class="row">
<div class="col-6">

        
       <div class="card my-4" style="w-100 ">
                        <div class="card-body">
                      <h5 class="card-title"></h5>
                      
                      <p class="card-text my-4">
                        
                          <span class="font-weight-bold"> Name: </span>{{$product->product_name}} <br>
                          <span class="font-weight-bold"> Category: </span> {{$product->category->category_name}}<br>
                        <span class="font-weight-bold"> Description: </span>{{$product->description}} <br>
                        <span class="font-weight-bold"> Available in Stock: </span>{{$product->stock}} <br>
                        <span class="font-weight-bold"> Unit Price: </span>{{$product->unit_price}} <br>
                      </p>
              
                    </div>
                  </div>
                  </div>
                  <div class="col-6">
 <img src="{{ $product->image }}" class="img img-fluid" alt="">
                 
                  </div>
       
    

    </div>
    </div>
 


@endsection