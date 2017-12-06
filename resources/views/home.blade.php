@extends('layouts.admin')

@section('content')
  <div class="col-md-9">
    <div class="card">
      <div class="card-header">Dashboard</div>

      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
        @endif

        <nav class="admin-nav">
          <ul>
            <li><a href="{{ route('roles.index') }}">Roles</a></li>
            <li><a href="{{ route('users.index') }}">Users</a></li>
            <li><a href="{{ route('permissions.index') }}">Permissions</a></li>
            <li><a href="{{ route('posts.index') }}">Posts</a></li>
        </nav>

        </div>
      </div>
    </div>
  @endsection
