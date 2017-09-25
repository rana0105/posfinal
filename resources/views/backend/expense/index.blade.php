@extends('layouts.app')

@section('content')
	<div class="col-md-10">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Expense Category Name</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      	@can('add_excategories')
						<a href="{{ URL::route('expenses.create') }}" class="btn btn-primary btn-sm">Create</a>
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
					<th>Expense Number</th>
					<th>Outlet</th>
					<th>Expense Type</th>
					<th>Amount</th>
					<th>Date</th>
					<th>Note</th>
					<th class="text-align-center">Action</th>
				</thead>

				<tbody>
					@foreach($expen as $exp)
						<tr>
							{{-- <th>{{ $exp->id  }}</th> --}}
							<td>{{ $exp->ex_number }}</td>
							<td>{{ $exp->outlets->out_name  }}</td>
							<td>{{ $exp->excategories->excate_name }}</td>
							<td>{{ $exp->ex_amount  }}</td>
							<td>{{ $exp->ex_date }}</td>
							<td>{{ $exp->ex_note  }}</td>
							<td>
							@can('edit_expenses')
							<a href="{{ URL::route('expenses.edit', $exp->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
							@endcan
							@can('delete_expenses')
							{!! Form::open(['route' => ['expenses.destroy', $exp->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger btn-responsive delete-btn'))}}
							{!! Form::close() !!}
							@endcan
							</td>
						</tr>
					@endforeach 
				</tbody>
			</table>
        </div>
    </div>
@endsection