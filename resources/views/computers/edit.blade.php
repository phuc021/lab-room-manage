@extends('master')

@section('title', 'Computers')

@section('body')

<div class="container-fluid">
		<center><h3>{{ trans('computer/edit.title')}}</h3></center>
		<div class="form-group">
			<form action="{{ url('computers/'.$computers->id) }}" method="POST">
			@csrf
			{{ method_field('put') }}
			<label for="name">{{ trans('computer/edit.name')}} :</label>
			<input type="text" class="form-control" name="name" value="{{ $computers->name }}" placeholder="Enter Name..."><br>

			<label for="desc">{{ trans('computer/edit.desc')}} :</label>
			<input type="text" class="form-control" name="desc" value="{{ $computers->desc }}" placeholder="Enter Desc..."><br>

			<label for="status">{{ trans('computer/edit.status')}} :</label>
			<select name="status" class="form-control">
				@foreach(ComputerHelper::getOptionStatus() as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select><br>
			
		

			<label for="rooms-id">{{ trans('computer/edit.roomsID')}} :</label>
			<input type="number" class="form-control" name="rooms_id" value="{{ $computers->rooms_id }}" placeholder="Enter Room ID..."><br>

			<button class="btn btn-danger" type="submit">{{ trans('computer/edit.submit')}}</button>
			</form>
		</div>
	</div>

@endsection