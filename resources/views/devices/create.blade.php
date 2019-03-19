@extends('master')

@section('title', 'Add New Devices')

@section('body')

	<div class="container">
		<div class="from-group">
			<h1 class="text-center">Add new devices</h1>
			<form action="{{url('devices')}}" method="post">
				@csrf
				<label for="name">Name:</label>
				<input type="text" class="form-control" placeholder="Enter Name" name="name">

				<label for="desc">Description:</label>
				<input type="text" class="form-control" placeholder="Enter description" name="desc">

				<label for="">Status:</label>
				<input type="text" class="form-control" placeholder="Enter status" name="status">

				<label for="">Type Devices ID:</label>
				<input type="number" class="form-control" placeholder="Enter Type Devices Id" name="type_devices_id">

				<label for="">Status:</label>
				<input type="number" class="form-control" placeholder="Enter status" name="computers_id">

				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>	

@endsection