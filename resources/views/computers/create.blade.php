@extends('master')

@section('title', 'Computers')

@section('body')

<div class="container">
		<center><h3>{{ trans('computer/ComputerCreate.title')}}</h3></center>
		<div class="form-group">
			<form action="{{url('computers')}}" method="POST">
			@csrf
			<label for="name">{{ trans('computer/ComputerCreate.name')}} :</label>
			<input type="text" class="form-control" name="name" placeholder="Enter Name..."><br>

			<label for="desc">{{ trans('computer/ComputerCreate.desc')}} :</label>
			<input type="text" class="form-control" name="desc" placeholder="Enter Desc..."><br>

			<label for="status">{{ trans('computer/ComputerCreate.status')}} :</label>
			<input type="text" class="form-control" name="status" placeholder="Enter Status..."><br>

			<label for="rooms-id">{{ trans('computer/ComputerCreate.roomsID')}} :</label>
			<input type="number" class="form-control" name="rooms_id" placeholder="Enter Room ID..."><br>

			<button class="btn btn-danger" type="submit">{{ trans('computer/ComputerCreate.submit')}}</button>
			</form>
		</div>
	</div>

@endsection