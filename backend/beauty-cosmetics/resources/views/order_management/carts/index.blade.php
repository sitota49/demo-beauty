@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Carts</li>
      </ol>
    </div>
    <div class="d-flex">
        <h3 class="flex-grow-1">Cart</h3>
        {{-- <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm my-1 ms-auto"><i class="fas fa-plus-square"></i> Add New</a> --}}
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>Customer Name</th>
              <th>Status</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @if ($carts->count() > 0)
              
                @foreach ($carts as $key => $cart)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $cart->customer->user->name }}</td>
                        <td>   @if ($cart->status == 'pending')
                          <span style=" color: rgb(19, 197, 19);">
                            <i class="fas fa-circle"></i>
                          </span>
                                Active
                          @else
                              <span style=" color: red;">
                            <i class="fas fa-circle"></i>
                          </span></i> Processed
                          @endif</td>
                        <td>
                          {{$cart->cart_total}}
                        </td>
                       
                      
                        <td>
                            <div class="d-flex">
                              <a href="{{ route('cart.show', $cart->cart_id) }}" class="btn btn-primary btn-sm mx-1">
                                  <i class="fas fa-eye"></i>
                                </a>
                        

                             
                               
                            </div>
                        </td>
                    </tr>
                @endforeach
              @else
              <tr>
                <td colspan="4">
                    <div class="card card-body m-1">
                        No Carts Found
                    </div>
                </td>
              </tr>
              @endif
          </tbody>
        </table>
      </div>
@endsection

