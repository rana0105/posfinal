@extends('layouts.app')

@section('content')
	<div class="col-md-12">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Sales</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      All Sales
			      	<div class="col-md-11">
						<a href="{{ URL::route('sales.create') }}" class="btn btn-primary btn-sm">Create Sales</a>
					</div>
			</header>
            <table class="table table-striped table-sm table-responsive">
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif
				<thead>
					<th>#</th>
					<th>Date</th>
					<th>Customer</th>
					<th>Waiter</th>
					<th>Total Discount</th>
					<th>Total Amount</th>
					<th>Payment</th>
					<th>Due</th>
					{{-- <th class="text-align-center">Action</th> --}}
				</thead>

				<tbody>
					@foreach($sales as $sal)
						<tr>
							<th>{{ $sal->id  }}</th>
							<td>{{ $sal->date  }}</td>
							<td>{{ $sal->customers->name }}</td>
							<td>{{ $sal->suppliers->supplier_name }}</td>
							<td>{{ $sal->st_discount }}</td>
							<td>{{ $sal->stotal_amount }}</td>
							<td>{{ $sal->spayment }}</td>
							<td>{{ $sal->sdue  }}</td>
							{{-- <td>
								<a href="{{ URL::route('salses.edit', $sal->id) }}" class="btn btn-info btn-responsive">
								<i class="glyphicon glyphicon-edit"></i></a>

							{!! Form::open(['route' => ['salses.destroy', $sal->id], 'method' => 'DELETE', 'class'=>'delete_form', 'ssaltyle'=>'display:inline' ])!!}
							
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-responsive delete-btn'))}}
							{!! Form::close() !!}
							</td> --}}
						</tr>
					@endforeach 
				</tbody>
			</table>
        </div>
    </div>
@endsection