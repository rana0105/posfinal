@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Setting</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      All Setting
			      	<div class="col-md-9">
			      	@can('add_settings')
						<a href="{{ URL::route('settings.create') }}" class="btn btn-primary btn-sm">Create Setting</a>
					@endcan
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
					<th>Shop Name</th>
					<th>Currency</th>
					<th>Tax/Vat</th>
					<th>Copyright</th>
					<th>Logo</th>
					<th class="text-align-center">Action</th>
				</thead>

				<tbody>
					@foreach($settings as $set)
						<tr>
							<th>{{ $set->id  }}</th>
							<td>{{ $set->shop_name  }}</td>
							<td>{{ $set->curen }}</td>
							<td>{{ $set->taxvat }}</td>
							<td>{{ $set->copy }}</td>
							<td>
							<img src="{{asset('upload_file/resize_images/')}}/{{ $set->logo }}" alt="" height="50" width="45" class="img-thumbnail">
							</td>
							<td>
							@can('edit_settings')
								<a href="{{ URL::route('settings.edit', $set->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
							@endcan
							{!! Form::open(['route' => ['settings.destroy', $set->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							@can('delete_settings')
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger btn-responsive delete-btn'))}}
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