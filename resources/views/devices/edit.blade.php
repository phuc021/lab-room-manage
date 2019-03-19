@extends('master')

@section('title', 'Edit Devices')

@section('body')

	<div class="container">
		<div class="from-group">
			<form action="{{ url('devices/'.$devices->id) }}" method="post">
				@csrf
				{{ method_field('put') }}


				<label >Name:</label>
				<input type="text" class="form-control" value="{{$devices->name}}" placeholder="Enter Name" name="name">

				<label>Description:</label>
				<input type="text" class="form-control" value="{{$devices->desc}}" placeholder="Enter description" name="desc">

				<label>Status:</label>
				<input type="text" class="form-control" value="{{$devices->status}}" placeholder="Enter status" name="status">

				<label>Type Devices ID:</label>
				<input type="number" class="form-control" value="{{$devices->type_devices_id}}" placeholder="Enter Type Devices Id" name="type_devices_id">

				<label>Status:</label>
				<input type="number" class="form-control" value="{{$devices->computers_id}}" placeholder="Enter Computer id" name="computers_id">

				<button type="submit" class="btn btn-default">Edit</button>
			</form>
		</div>
	</div>

@endsection