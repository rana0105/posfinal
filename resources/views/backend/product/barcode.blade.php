@extends('layouts.app')

@section('content')
	<div class="col-md-6">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Barcode</h3>
                <hr />
            </div>
            <header class="panel-heading">
						<a href="{{ URL::route('products.create') }}" class="btn btn-primary btn-sm">Create Barcode</a>
			</header>
            <table class="table table-striped table-sm table-responsive">
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif
				<thead>
					<th>#</th>
					<th></th>
					<th></th>
					<th>BarCode</th>
				</thead>

				<tbody>
					@foreach($barcode as $barcod)
						<tr>
							<th>{{ $barcod->id  }}</th>
							<td></td>
							<td></td>
							<td>{{ $barcod->bar_code }}</td>
						</tr>
					@endforeach 
				</tbody>
			</table>
        </div>
    </div>
@endsection