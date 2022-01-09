@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Create a New Category</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('category.index') }}">Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add New</li>
      </ol>
    </div>
    {{ Form::open(['route' => 'category.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Category Name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Category Description']) !!}
                </div>
          
               
                <div class="form-group">
                    {!! Form::label('image', 'Image') !!}
                    {!! Form::file('image', ['class' => 'form-control', 'placeholder' => 'Image']) !!}
                </div>
                <div class="form-group">
                    <br>
                    {!! Form::submit('Save Category', ['class' => 'btn btn-primary float-left mt-2']) !!}
                </div>
          
    {{ Form::close() }}
@endsection
