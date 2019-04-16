@extends('master')

@section('title', 'Add New Devices')

@section('body')
@include('partials/navigation_bar')
@section('title-bar', 'TypeDevices')
<div class="container-fluid">
	<div class="from-group">
		<form action="{{ url('typedevices') }}" method="post">
			@csrf
				<label for="name">Name:</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" placeholder="Enter Name" name="name" id="name">

			<div class="form-group">
				<button id="btn-form-user" type="submit" class="btn btn-primary">Create</button>
			</div>
		</form>
	</div>
</div>
@endsection