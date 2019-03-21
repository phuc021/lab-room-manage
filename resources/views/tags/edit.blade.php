@extends('master')

@section('title', 'Tag manager')

@section('body')

	<div class="container">
			<div class="form-group">
				<form action="{{ url('tags/'.$tags->id) }}" method="POST">
				@csrf
				{{method_field('put') }}
				<p>
					<h3>
						<center>Edit</center>
					</h3>
				</p>
				<label for="">{{trans('tags/create.value')}}:</label>
				
				<input type="text" class="form-control" name="value" value="{{ $tags->value }}">

				<label for="">{{trans('tags/create.deviceid')}}:</label>
				
				{{-- không dùng input, dùng option --}}
				<input type="text" class="form-control" name="devices_id" value="{{ $tags->devices_id }}">
				<br>
					<button class="btn btn-success" type="sumbit">Sumbit</button>
				</form>
			</div>
		</div>
@endsection
