@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Pament Methods</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      	@can('add_paymethods')
						<a href="{{ URL::route('paymethods.create') }}" class="btn btn-primary btn-sm">Create Pament Methods</a>
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
					<th>Payment Method Name</th>
					<th>Status</th>
					<th class="text-align-center">Action</th>
				</thead>

				<tbody>
					@foreach($pay as $m)
						<tr>
							<th>{{ $m->id  }}</th>
							<td>{{ $m->pay_name  }}</td>
							<td>
								@if($m->status == 1)
	                               <h4 class="active">Active</h4>
		                        @endif
		                        @if($m->status == 0)
		                            <h4 class="inactive">Inactive</h4>
		                        @endif
							</td>
							<td>
							@can('edit_paymethods')
								<a href="{{ URL::route('paymethods.edit', $m->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
							@endcan
							{!! Form::open(['route' => ['paymethods.destroy', $m->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							@can('delete_paymethods')
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger delete-btn'))}}
							@endcan
							{!! Form::close() !!}
							</td>
						</tr>
					@endforeach 
				</tbody>
			</table>
        </div>
    </div>
@endsection