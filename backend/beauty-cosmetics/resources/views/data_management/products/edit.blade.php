@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('product.index') }}">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </div>
  {{ Form::open(['route' => ['product.update', $product->product_id], 'method' => 'POST']) }}
      
                <div class="form-group">
                    {!! Form::label('product_name', 'Product Name') !!}
                    {!! Form::text('product_name', $product->product_name, ['class' => 'form-control', 'placeholder' => 'Product Name']) !!}
                </div>
                  <div class="form-group">
                    {!! Form::label('category', 'Category') !!}
                    {!! Form::select('category', $categories, $product->category_id, ['class' => 'form-control', 'placeholder' => 'Select Category']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Product Description']) !!}
                </div>
                 <div class="form-group">
                    {!! Form::label('unit_price', 'Unit Price') !!}
                    {!! Form::number('unit_price', $product->unit_price, ['class' => 'form-control', 'placeholder' => 'Product Unit Price','step' => '0.01']) !!}
                </div>
                  <div class="form-group">
                    {!! Form::label('stock', 'Number in Stock') !!}
                    {!! Form::number('stock', $product->stock, ['class' => 'form-control', 'placeholder' => 'umber in Stock']) !!}
                </div>
          
                <div class="form-group">
                    {!! Form::label('image', 'Image') !!}
                    {!! Form::file('image', ['class' => 'form-control', 'placeholder' => 'Image']) !!}
                </div>
                <div class="form-group">
                    <br>
                    {!! Form::hidden('_method', 'PUT') !!}
                    {!! Form::submit('Update Product', ['class' => 'btn btn-primary float-left mt-2']) !!}
                </div>
           
    {{ Form::close() }}
@endsection
