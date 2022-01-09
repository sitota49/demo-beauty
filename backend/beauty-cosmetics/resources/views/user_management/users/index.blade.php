@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
      </ol>
    </div>
    <div class="d-flex">
        <h3 class="flex-grow-1">User</h3>
        {{-- <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm my-1 ms-auto"><i class="fas fa-plus-square"></i> Add New</a> --}}
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Roles</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @if ($users->count() > 0)
              
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        @if ($user->userRoles->count() > 0)
                            @foreach ($user->userRoles as $userRole)
                                <p>{{$userRole->role->name}}</p>
                            @endforeach
                        @else
                            <p>No Role Found</p>
                        @endif  
                        </td>
                       
                      
                        <td>
                            <div class="d-flex">
                              <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-sm mx-1">
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
                        No Users Found
                    </div>
                </td>
              </tr>
              @endif
          </tbody>
        </table>
      </div>
@endsection

