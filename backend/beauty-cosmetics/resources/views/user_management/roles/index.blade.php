@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Roles</li>
      </ol>
    </div>
    <div class="d-flex">
        <h3 class="flex-grow-1">Role</h3>
        <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm my-1 ms-auto"><i class="fas fa-plus-square"></i> Add New</a>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @if ($roles->count() > 0)
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('role.edit', $role->role_id) }}" class="btn btn-warning btn-sm mx-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <div class="mx-1">
                                    {{ Form::open(['route' => ['role.destroy', $role->role_id], 'method' => 'POST']) }}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
              @else
              <tr>
                <td colspan="4">
                    <div class="card card-body m-1">
                        No Role Found
                    </div>
                </td>
              </tr>
              @endif
          </tbody>
        </table>
      </div>
@endsection

