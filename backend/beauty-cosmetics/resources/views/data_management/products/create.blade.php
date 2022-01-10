@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Create a New Product</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('product.index') }}">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add New</li>
      </ol>
    </div>
    {{ Form::open(['route' => 'product.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        
                <div class="form-group">
                    {!! Form::label('product_name', 'Prodcut Name') !!}
                    {!! Form::text('product_name', '', ['class' => 'form-control', 'placeholder' => 'Product Name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category', 'Category') !!}
                    {!! Form::select('category', $categories, '', ['class' => 'form-control', 'placeholder' => 'Select Category']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Product Description']) !!}
                </div>
                  <div class="form-group">
                    {!! Form::label('unit_price', 'Unit Price') !!}
                    {!! Form::number('unit_price', '', ['class' => 'form-control', 'placeholder' => 'Product Unit Price', 'step' => '0.01']) !!}
                </div>
                  <div class="form-group">
                    {!! Form::label('stock', 'Number in Stock') !!}
                    {!! Form::number('stock', '', ['class' => 'form-control', 'placeholder' => 'Number in Stock']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Image') !!}
                    {!! Form::file('image', ['class' => 'form-control', 'placeholder' => 'Image']) !!}
                </div>
                <div class="form-group">
                    <br>
                    {!! Form::submit('Save Product', ['class' => 'btn btn-primary float-left mt-2']) !!}
                </div>
          
    {{ Form::close() }}
@endsection
