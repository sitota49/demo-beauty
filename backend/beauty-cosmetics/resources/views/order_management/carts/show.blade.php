@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Cart Details</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('cart.index') }}">Carts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cart Details</li>
      </ol>
    </div>
   
    <div>
      
         <div class="card-group">
      
           <div class="card py-4 my-4 mx-3" style="w-100 p-5">
                        <div class="card-body">
                      <h5 class="card-title">Cart</h5>
                      
                      <p class="card-text my-4">
               
                        <span class="font-weight-bold"> Status: </span>
                            @if ($cart->status == 'pending')
                          <span style=" color: rgb(19, 197, 19);">
                            <i class="fas fa-circle"></i>
                          </span>
                                Active
                          @else
                              <span style=" color: red;">
                            <i class="fas fa-circle"></i>
                          </span></i> Processed
                          @endif <br>
                          <span class="font-weight-bold"> Current Total: </span> {{$cart->cart_total}} ETB<br>
                         {{-- @if ($user->userRoles->count() > 0)
                     <span class="font-weight-bold"> Roles: </span>
                    @foreach ($user->userRoles as $userRole)
                     {{$userRole->role->name}}
                    @endforeach
                      @endif --}}

                      </p>
              
                    </div>
                  </div>

               
       

           <div class="card  py-4 my-4 mx-3 " style="w-100 ">
                        <div class="card-body">
                      <h5 class="card-title">Customer</h5>
                      
                      <p class="card-text my-4">
           
                          <span class="font-weight-bold"> Name: </span>{{$cart->customer->user->name}} <br>
                          <span class="font-weight-bold"> Email: </span>{{$cart->customer->user->email}} <br>
                          <span class="font-weight-bold"> Phone Number: </span> {{$cart->customer->phone_number}}<br>
                          <span class="font-weight-bold"> Address: </span> {{$cart->customer->address}}<br>
                          <span class="font-weight-bold"> Payment Method: </span> {{$cart->customer->payment_method}}<br>
                        

                      </p>
                    
              
                    </div>
                  </div>

               
       
    

 
        </div>
        <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>Product Name</th>
              <th>Cateogry</th>
              <th>Unit Price</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
              @if ($cart->orderItems->count() > 0)
              
                @foreach ($cart->orderItems as $key => $order_item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $order_item->product->product_name }}</td>
                        <td>{{ $order_item->product->category->category_name }}</td>
                        <td>{{$order_item->product->unit_price}}</td>
                        <td>{{$order_item->quantity}}</td>
                        <td>{{$order_item->order_item_total}}</td>
                    </tr>
                @endforeach
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                        <td><span class="font-weight-bold"> Total: </span>{{$cart->cart_total}}</td>
                    </tr>
              @else
              <tr>
                <td colspan="4">
                    <div class="card card-body m-1">
                        No Items Found
                    </div>
                </td>
              </tr>
              @endif
          </tbody>
        </table>
      </div>


      </div>
      

        


@endsection