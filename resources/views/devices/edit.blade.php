@extends('master')

@section('title', 'Edit Devices')

@section('body')
	<div class="container-fluid vip">
		<div class="from-group">
			<h3 class="text-center font-bold">Add new devices</h3>
			<form action="{{ url('devices/'.$devices->id) }}" method="post">
				@csrf
				{{ method_field('put') }}


				<label >Name:</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" value="{{$devices->name}}" placeholder="Enter Name" name="name">

				<label>Description:</label>
				<label class="alertdevice">{{ $errors->has('desc') ? $errors->first('desc') : ''}}</label>
				<input type="text" class="form-control {{ $errors->has('desc') ? 'has-error' : ''}}" value="{{$devices->desc}}" placeholder="Enter description" name="desc">

				<label>Status:</label>
				<select name="status" class="form-control">
					@foreach(DeviceHelper::getOptionStatus() as $key => $value)
						<option value="{{$key}}">{{$value}}</option>
					@endforeach
				</select><br>
				

				<label>Type Devices:</label>
				<input type="number" class="form-control" value="{{$devices->type_devices_id}}" placeholder="Enter Type Devices Id" name="type_devices_id">

				<label>Computer:</label>
				<input type="number" class="form-control" value="{{$devices->computers_id}}" placeholder="Enter Computer id" name="computers_id">

				<button type="submit" class="btn btn-default cre-sub">Edit</button>
			</form>
		</div>
	</div>

@endsection