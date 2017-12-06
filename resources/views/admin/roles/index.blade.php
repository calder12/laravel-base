@extends('layouts.admin')
@section('title', '| Roles')
@section('content')
<div class='col-md-9'>
  <h1><i class="fa fa-key"></i> Roles Management
    <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>
  </h1>
  <hr>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Role</th>
          <th>Permissions</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($roles as $role)
        <tr>
          <td>{{ $role->name }}</td>
          <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
          <td>
            <a href="{{ URL::to('roles/'.$role->id.'/edit') }}">Edit</a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'class' => 'form-inline', 'style' => 'display:inline-block; margin-left: 10px;', 'id' => 'delete-' . $role->id ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn-link delete-button', 'data-elementId=' . $role->id ]) !!}
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection