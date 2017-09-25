@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Supplier</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      	@can('add_suppliers')
						<a href="{{ URL::route('suppliers.create') }}" class="btn btn-primary btn-sm">Create Supplier</a>
					@endcan
			</header>
            <table class="table table-striped table-sm table-responsive">
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif
				<thead>
					{{-- <th>#</th> --}}
					<th>Company Name</th>
					<th>Supplier Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Image</th>
					<th class="text-align-center">Action</th>
				</thead>

				<tbody>
					@foreach($suppliers as $supplier)
						<tr>
							{{-- <th>{{ $supplier->id  }}</th> --}}
							<td>{{ $supplier->company_name }}</td>
							<td>{{ $supplier->supplier_name }}</td>
							<td>{{ $supplier->email }}</td>
							<td>{{ $supplier->phone }}</td>
							<td>
							<img src="{{asset('upload_file/resize_images/')}}/{{ $supplier->p_image }}" alt="" height="50" width="45" class="img-thumbnail">
							</td>
							<td>
							@can('edit_suppliers')
								<a href="{{ URL::route('suppliers.edit', $supplier->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
							@endcan
							{{-- @can('delete_suppliers')
							{!! Form::open(['route' => ['suppliers.destroy', $supplier->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger btn-responsive delete-btn'))}}
							{!! Form::close() !!}
							@endcan --}}
							</td>
						</tr>
					@endforeach 
				</tbody>
			</table>
        </div>
    </div>
@endsection