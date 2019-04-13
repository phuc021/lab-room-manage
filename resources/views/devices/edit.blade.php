@extends('master')

@section('title', 'Edit Devices')

@section('body')
	@include('partials/navigation_bar')
	@section('title-bar', trans('devices/edit.edit_device'))
	<div class="container-fluid">
		<div class="from-group lb">
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
				<select name="typedevice_id" class="form-control" value="{{ $devices->typedevice_id}}">
					@foreach($typedevicesList as $typedevices)
						<option value="{{ $typedevices->id }}"> {{ $typedevices->name }} </option>
					@endforeach
				</select>

				<label>Computer:</label>
				<select name="computer_id" class="form-control" value="{{ $devices->computer_id}}">
					@foreach($computerList as $computer)
						<option value="{{ $computer->id }}"> {{ $computer->name }} </option>
					@endforeach
				</select>

				<button id="btn-form-user" type="submit" class="btn btn-default cre">Edit</button>
			</form>
		</div>
	</div>

@endsection