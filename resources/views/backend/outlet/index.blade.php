@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Outlet Name</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      	@can('add_outlet')
						<a href="{{ URL::route('outlets.create') }}" class="btn btn-primary btn-sm">Create</a>
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
					<th>Outlet Name</th>
					<th>Contact Number</th>
					<th>Address</th>
					<th>Status</th>
					<th class="text-align-center">Action</th>
				</thead>

				<tbody>
					@foreach($out as $om)
						<tr>
							<th>{{ $om->id  }}</th>
							<td>{{ $om->out_name }}</td>
							<th>{{ $om->out_contact  }}</th>
							<td>{{ $om->out_address }}</td>
							<td>
								@if($om->status == 1)
	                               <h4 class="active">Active</h4>
		                        @endif
		                        @if($om->status == 0)
		                            <h4 class="inactive">Inactive</h4>
		                        @endif
							</td>
							<td>
							@can('edit_outlet')
							<a href="{{ URL::route('outlets.edit', $om->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
							@endcan
							{{-- @can('delete_excategories') --}}
							{{-- {!! Form::open(['route' => ['outlets.destroy', $om->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-responsive delete-btn'))}}
							{!! Form::close() !!} --}}
							{{-- @endcan --}}
							</td>
						</tr>
					@endforeach 
				</tbody>
			</table>
        </div>
    </div>
@endsection