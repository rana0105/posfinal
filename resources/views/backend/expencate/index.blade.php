@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Expense Category Name</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      	@can('add_excategories')
						<a href="{{ URL::route('excategories.create') }}" class="btn btn-primary btn-sm">Create</a>
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
					<th>Expense Category Name</th>
					<th class="text-align-center">Action</th>
				</thead>

				<tbody>
					@foreach($excates as $ext)
						<tr>
							{{-- <th>{{ $ext->id  }}</th> --}}
							<td>{{ $ext->excate_name }}</td>
							<td>
							@can('edit_excategories')
							<a href="{{ URL::route('excategories.edit', $ext->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
							@endcan
							{{-- @can('delete_excategories')
							{!! Form::open(['route' => ['excategories.destroy', $ext->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							
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