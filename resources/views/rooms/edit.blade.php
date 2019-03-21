@extends('master')

@section('title', 'Room manage')


@section('body')

	<div class="container-fluid">
			<div class="form-group">
				<form action="{{ url('rooms/'.$rooms->id) }}" method="POST">

				@csrf
				{{method_field('put') }}
				<p>
					<h3>
						<center>Edit</center>
					</h3>
				</p>
				<label for="name">Name:</label>

				<input class="form-control" type="text" name="name" value="{{ $rooms->name }}">

				<label for="desc">Desc:</label>

				<input type="text" class="form-control" name="desc" value="{{ $rooms->desc }}" placeholder="Desc"><br>

				<label for="">{{ trans('rooms/create.status')}}:</label>
				
				<select name="status" class="form-control">
					@foreach(RoomsHelper::getOptionStatus() as $key => $value)
						<option value="{{$key}}">{{$value}}</option>
					@endforeach
				</select><br>
					<button type="sumbit">Sumbit</button>
				</form>
			</div>
		</div>
@endsection
