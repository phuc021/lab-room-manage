@extends('master')

@section('title', 'Edit TypeDevices')

@section('body')
	@include('partials/navigation_bar')
	<div class="form-user container-fluid">
		<div class="from-group">
			<form action="{{ url('typedevices/'.$typedevices->id) }}" method="post">
				@csrf
				{{ method_field('put') }}
				<label >Name:</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control{{ $errors->has('name') ? 'has-error' : ''}}" value="{{$typedevices->name}}" placeholder="Enter Name" name="name">
				<br>

				<div class="from-group">
					<button id="btn-form-tdv" type="submit" class="btn btn-success">Edit</button>
				</div>
			</form>
		</div>
	</div>

@endsection