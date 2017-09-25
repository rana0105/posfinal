@extends('layouts.app')

@section('content')
	<div class="col-md-12">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Product</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      	@can('add_products')
						<a href="{{ URL::route('products.create') }}" class="btn btn-primary btn-sm">Create Product</a>
					@endcan
			</header>
			{{-- <h4>Total {{ $products->total() }} products.</h4>
			<h5>{{ $products->count() }} product in this page.</h5> --}}
            <table class="table table-striped table-sm table-responsive">
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif
				<thead> 
					{{-- <th>#</th> --}}
					<th>Name</th>
					<th>Code</th>
					<th>BarCode</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Pur_Price</th>
					<th>Cost</th>
					<th>Tax</th>
					<th>Discount</th>
					<th>Quantity</th>
					<th>Sale_Price</th>
					<th>Image</th>
					<th class="text-align-center">Action</th>
				</thead>

				<tbody>
					@foreach($products as $product)
						<tr>
							{{-- <th>{{ $product->id  }}</th> --}}
							<td>{{ $product->name  }}</td>
							<td>{{ $product->code }}</td>
							<td>{{ $product->bar_code }}</td>
							<td>{{ $product->procategories->name }}</td>
							<td>{{ $product->brands->name }}</td>
							<td>{{ $product->pur_price  }}</td>
							<td>{{ $product->cost  }}</td>
							<td>{{ $product->tax }}</td>
							<td>{{ $product->discount }}</td>
							<td>{{ $product->quantity }}</td>
							<td>{{ $product->sale_price }}</td>
							<td>
							<img src="{{asset('upload_file/resize_images/')}}/{{ $product->image }}" alt="" height="50" width="45" class="img-thumbnail">
							</td>
							<td>
							@can('edit_products')
								<a href="{{ URL::route('products.edit', $product->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
							@endcan
							@can('delete_products')
							{!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger btn-responsive delete-btn'))}}
							{!! Form::close() !!}
							@endcan
							</td>
						</tr>
					@endforeach 
				</tbody>
			</table>
        </div>
        <div class="text-center">
            {{ $products->links() }}
    	</div>
    </div>
@endsection