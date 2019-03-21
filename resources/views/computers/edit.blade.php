@extends('master')

@section('title', 'Computers')

@section('body')

<div class="container">
		<center><h3>{{ trans('computer/ComputerEdit.title')}}</h3></center>
		<div class="form-group">
			<form action="{{url('computers')}}" method="POST">
			@csrf
			<label for="name">{{ trans('computer/ComputerEdit.name')}} :</label>
			<input type="text" class="form-control" name="name" placeholder="Enter Name..."><br>

			<label for="desc">{{ trans('computer/ComputerEdit.desc')}} :</label>
			<input type="text" class="form-control" name="desc" placeholder="Enter Desc..."><br>

			<label for="status">{{ trans('computer/ComputerEdit.status')}} :</label>
			<input type="text" class="form-control" name="status" placeholder="Enter Status..."><br>

			<label for="rooms-id">{{ trans('computer/ComputerEdit.roomsID')}} :</label>
			<input type="number" class="form-control" name="rooms_id" placeholder="Enter Room ID..."><br>

			<button class="btn btn-danger" type="submit">{{ trans('computer/ComputerEdit.submit')}}</button>
			</form>
		</div>
	</div>

@endsection