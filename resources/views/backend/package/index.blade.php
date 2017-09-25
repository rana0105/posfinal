@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Package</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      	@can('add_purchases')
						<a href="{{ URL::route('packages.create') }}" class="btn btn-primary btn-sm">Create Package</a>
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
					<th>Package Name</th>
					<th>Status</th>
					<th class="text-align-center">Action</th>
				</thead>

				<tbody>
					@foreach($packages as $pac)
						<tr>
						<th>{{ $pac->id }}</th>
							<th>{{ $pac->name }}</th>
							<td>
							  @if($pac->actinact == 1)
                        	  <h4 class="active">Active</h4>
	                          @endif
	                          @if($pac->actinact == 0)
	                            <h4 class="inactive">Inactive</h4>
	                          @endif  
							</td>
							<td>
							{{-- @can('edit_purchases') --}}
								<a href="{{ URL::route('packages.edit', $pac->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
							{{-- @endcan
							@can('delete_purchases') --}}
							{!! Form::open(['route' => ['packages.destroy', $pac->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger delete-btn'))}}
							{!! Form::close() !!}
							{{-- @endcan --}}
							</td>
						</tr>
					@endforeach 
				</tbody>
			</table>
        </div>
    </div>
@endsection