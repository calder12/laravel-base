@extends('layouts.admin')
@section('content')
  <div class="col-md-9">
  <h1><i class="fa fa-key"></i>Permissions Management
    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>
  </h1>
  <hr>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Permissions</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($permissions as $permission)
        <tr>
          <td>{{ $permission->name }}</td> 
          <td>
            <a href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id], 'class' => 'form-inline', 'style' => 'display:inline-block; margin-left: 10px;', 'id' => 'delete-' . $permission->id ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn-link delete-button', 'data-elementId=' . $permission->id ]) !!}
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection