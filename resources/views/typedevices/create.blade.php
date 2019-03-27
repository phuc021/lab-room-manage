@extends('master')

@section('title', 'Add New Devices')

@section('body')

	<div class="container-fluid vip">
		<div class="from-group">
			<h1 class="text-center">ADD NEW TYPE DEVICES</h1>
			
			<form action="{{url('typedevices')}}" method="post">
				@csrf
				<label for="name">Name:</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control" placeholder="Enter Name" name="name">
				
				<button type="submit" class="btn btn-default cre-sub">Submit</button>
			</form>
		</div>
	</div>	

@endsection