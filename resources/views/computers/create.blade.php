@extends('master')

@section('title', 'Computers')
<style type="text/css">
		.has-error{
			background-color: red;
		}
	</style>
@section('body')

<div class="container-fluid">
		<center><h3>{{ trans('computer/create.title')}}</h3></center>
		<div class="form-group">
			<form action="{{url('computers')}}" method="POST">
			@csrf
			<label for="name">{{ trans('computer/create.name')}} :</label>
			<label class="alertcpt">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
			<input type="text" class="input {{ $errors->has('name') ? 'has-error' : ''}}" name="name" placeholder="Enter Name..."><br>

			<label for="desc">{{ trans('computer/create.desc')}} :</label>
			<label class="alertcpt">{{ $errors->has('desc') ? $errors->first('desc') : ''}}</label>
			<input type="text" class="input {{ $errors->has('name') ? 'has-error' : ''}}" name="desc" placeholder="Enter Desc..."><br>

			<label for="status">{{ trans('computer/create.status')}} :</label>
			<select name="status" class="input">
				@foreach(ComputerHelper::getOptionStatus() as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select><br>

			<label for="rooms-id">{{ trans('computer/create.roomsID')}} :</label>
			<select name="rooms_id" class="input">
				@foreach($roomList as $room)
					<option value="{{ $room->id  }}">{{ $room->name }}</option>
				@endforeach
			</select><br>

			<button class="btn btn-danger" type="submit">{{ trans('computer/create.submit')}}</button>
			</form>
		</div>
	</div>

@endsection