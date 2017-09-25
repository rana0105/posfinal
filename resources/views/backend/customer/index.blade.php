@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Customer</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      	@can('add_customers')
						<a href="{{ URL::route('customers.create') }}" class="btn btn-primary btn-sm">Create Customer</a>
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
					<th>Customer type</th>
					<th>Name</th>
					<th>Shop Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Image</th>
					<th class="text-align-center">Action</th>
				</thead>

				<tbody>
					@foreach($customers as $customer)
						<tr>
							{{-- <th>{{ $customer->id  }}</th> --}}
							<td>{{ $customer->customertypes->type_name  }}</td>
							<td>{{ $customer->name }}</td>
							<td>{{ $customer->shop_name }}</td>
							<td>{{ $customer->email }}</td>
							<td>{{ $customer->phone }}</td>
							<td>
							{{-- <div class="col-md-3">
				                <div class="thumbnail">
				                <a href="../upload_file/resize_image/{{ $product->product_image }}" class="fancybox" rel="group">
				                  <img src="../upload_file/resize_image/{{ $product->product_image }}" alt=""> </a>
				                </div>
				               <p class="caption">{{ $product->category->title }}</p>
				              </div> --}}
							<a href="{{asset('upload_file/resize_images/')}}/{{ $customer->image }}" class="fancybox" rel="group"><img src="{{asset('upload_file/resize_images/')}}/{{ $customer->image }}" alt="" height="50" width="45" class="img-thumbnail"></a>
							</td>
							<td>
							@can('edit_customers')
								<a href="{{ URL::route('customers.edit', $customer->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
							@endcan
							{{-- @can('delete_customers')
							{!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-responsive delete-btn'))}}
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