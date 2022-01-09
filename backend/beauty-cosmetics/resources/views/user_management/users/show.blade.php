@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{$user->name}}</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.index') }}">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">User Details</li>
      </ol>
    </div>
   
    <div>

       <div class="card my-4" style="w-100 ">
                        <div class="card-body">
                      <h5 class="card-title">General Information</h5>
                      
                      <p class="card-text my-4">
                        
                          <span class="font-weight-bold"> Email: </span>{{$user->email}} <br>
                          <span class="font-weight-bold"> Phone Number: </span> {{$user->phone_number}}<br>
                         @if ($user->userRoles->count() > 0)
                     <span class="font-weight-bold"> Roles: </span>
                    @foreach ($user->userRoles as $userRole)
                     {{$userRole->role->name}}
                    @endforeach
                      @endif

                      </p>
              
                    </div>
                  </div>

                   <div class="card my-4" style="w-100 ">
                        <div class="card-body">
                      <h5 class="card-title">Customer Details</h5>
                      <h6 class="card-subtitle mb-2 text-muted"> </h6>
                      <p class="card-text">
                   
                         <span class="font-weight-bold"> Address: </span> {{$user->customer->address}} <br>
                         <span class="font-weight-bold"> Phone Number: </span>: {{$user->customer->phone_number}} <br>
                         <span class="font-weight-bold"> Payment Method: </span>  {{$user->customer->payment_method}} <br>
                         @if ($user->customer->credit_card_number != null)
                             
                        <span class="font-weight-bold"> Credit Card Number: </span> {{$user->customer->credit_card_number}} <br>
                             
                         @endif
                         
                      
                       
                      </p>
              
                    </div>
                  </div>
       
    

    </div>
 


@endsection