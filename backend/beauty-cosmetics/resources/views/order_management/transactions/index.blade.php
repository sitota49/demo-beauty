@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Transactions</li>
      </ol>
    </div>
    <div class="d-flex">
        <h3 class="flex-grow-1">Transactions</h3>
        {{-- <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm my-1 ms-auto"><i class="fas fa-plus-square"></i> Add New</a> --}}
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>Customer Name</th>
              <th>Total</th>
              <th>Date</th>
             
            </tr>
          </thead>
          <tbody>
              @if ($transactions->count() > 0)
              
                @foreach ($transactions as $key => $transaction)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $transaction->cart->customer->user->name }}</td>
                        
                        <td>
                          {{$transaction->cart->cart_total}}
                        </td>
                       
                      
                        <td>
                          {{$transaction->transaction_date}}
                        </td>
                    </tr>
                @endforeach
              @else
              <tr>
                <td colspan="4">
                    <div class="card card-body m-1">
                        No Transactions Found
                    </div>
                </td>
              </tr>
              @endif
          </tbody>
        </table>
      </div>
@endsection

