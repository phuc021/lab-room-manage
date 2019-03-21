@extends('master')

@section('title', 'Edit Devices')

@section('body')
	<div class="container-fluid">
		<div class="from-group">
			<form action="{{ url('devices/'.$devices->id) }}" method="post">
				@csrf
				{{ method_field('put') }}


				<label >Name:</label>
				<label>{{ $errors->has('email') ? $errors->first('email') : ''}}</label>
				<input type="text" class="form-control" value="{{$devices->name}}" placeholder="Enter Name" name="name">

				<label>Description:</label>
				<input type="text" class="form-control" value="{{$devices->desc}}" placeholder="Enter description" name="desc">

				<label>Status:</label>
				<select name="status" class="form-control">
					@foreach(DeviceHelper::getOptionStatus() as $key => $value)
						<option value="{{$key}}">{{$value}}</option>
					@endforeach
				</select><br>
				

				<label>Type Devices ID:</label>
				<input type="number" class="form-control" value="{{$devices->type_devices_id}}" placeholder="Enter Type Devices Id" name="type_devices_id">

				<label>Computer ID:</label>
				<input type="number" class="form-control" value="{{$devices->computers_id}}" placeholder="Enter Computer id" name="computers_id">

				<button type="submit" class="btn btn-default">Edit</button>
			</form>
		</div>
	</div>

@endsection