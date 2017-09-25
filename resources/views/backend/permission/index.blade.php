@extends('layouts.app')

@section('content')
	<div class="col-md-10">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Permission</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      	@can('add_permissions')
						<a href="{{ URL::route('permissions.create') }}" class="btn btn-primary btn-sm">Create</a>
					@endcan
			</header>
            <table class="table table-striped table-sm table-responsive">
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Guard Name</th>
					<th>Display Name</th>
					<!--<th class="text-align-center">Action</th>-->
				</thead>

				<tbody>
					@foreach($permissions as $permission)
						<tr>
							<th>{{ $permission->id  }}</th>
							<td>{{ $permission->name }}</td>
							<td>{{ $permission->guard_name }}</td>
							<td>{{ $permission->display_name }}</td>
							{{-- <td>
							@can('edit_permissions')
							<a href="{{ URL::route('permissions.edit', $permission->id) }}" class="btn btn-info btn-responsive"><i class="glyphicon glyphicon-edit"></i></a>
							@endcan
							@can('delete_permissions')
							{!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-responsive delete-btn'))}}
							{!! Form::close() !!}
							@endcan
							</td> --}}
						</tr>
					@endforeach 
				</tbody>
			</table>
			<div class="text-center">
            	{{ $permissions->links() }}
        	</div>
        </div>
    </div>
@endsection