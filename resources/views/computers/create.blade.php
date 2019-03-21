@extends('master')

@section('title', 'Computers')

@section('body')

<div class="container-fluid">
		<center><h3>{{ trans('computer/create.title')}}</h3></center>
		<div class="form-group">
			<form action="{{url('computers')}}" method="POST">
			@csrf
			<label for="name">{{ trans('computer/create.name')}} :</label>
			<input type="text" class="form-control" name="name" placeholder="Enter Name..."><br>

			<label for="desc">{{ trans('computer/create.desc')}} :</label>
			<input type="text" class="form-control" name="desc" placeholder="Enter Desc..."><br>

			<label for="status">{{ trans('computer/create.status')}} :</label>
			<select name="status" class="form-control">
				@foreach(ComputerHelper::getOptionStatus() as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select><br>

			<label for="rooms-id">{{ trans('computer/create.roomsID')}} :</label>
			<input type="number" class="form-control" name="rooms_id" placeholder="Enter Room ID..."><br>

			<button class="btn btn-danger" type="submit">{{ trans('computer/create.submit')}}</button>
			</form>
		</div>
	</div>

@endsection