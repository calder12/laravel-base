@extends('layouts.admin')
@section('content')
<div class="col-md-9">
  <h1><i class="fa fa-users"></i> User Management 
    <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
  </h1>
  <hr>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Date/Time Added</th>
          <th>User Roles</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
          <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
          <td>
            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'class' => 'form-inline', 'style' => 'display:inline-block; margin-left: 10px;' ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn-link']) !!}
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection