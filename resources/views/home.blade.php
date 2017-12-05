@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col-md-8 offset-md-2">
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
    </div>
  </div>
  @endsection
