@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edit Role</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('role.index') }}">Roles</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </div>
    {{ Form::open(['route' => ['role.update', $role->role_id], 'method' => 'POST']) }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', $role->name, ['class' => 'form-control', 'placeholder' => 'RoleName', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::hidden('_method', 'PUT') !!}
                    {!! Form::submit('Update', ['class' => 'btn btn-primary btn-sm float-right']) !!}
                </div>
            </div>
        </div>

    {{ Form::close() }}
@endsection
