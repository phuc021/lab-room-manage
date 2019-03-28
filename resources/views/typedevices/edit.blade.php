@extends('master')

@section('title', 'Edit Devices')

@section('body')
	<div class="container-fluid">
		<div class="from-group">
			<form action="{{ url('typedevices/'.$typedevices->id) }}" method="post">
				@csrf
				{{ method_field('put') }}


				<label >Name:</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" value="{{$typedevices->name}}" placeholder="Enter Name" name="name">



				<button type="submit" class="btn btn-default edi-sub">Edit</button>
			</form>
		</div>
	</div>

@endsection