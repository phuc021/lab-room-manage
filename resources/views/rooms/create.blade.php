@extends('master')

@section('title', 'Room manage')


@section('body')

	<div>
	</div>
		<div class="container-fluid">

			<div class="form-group">

				<form action="{{ url('rooms') }}" method="POST">
					@csrf
					<p>
						<h3>
							<center>{{ trans('rooms/create.create_new_room') }}</center>
						</h3>
					</p>

					<label for="">{{ trans('rooms/create.name')}}:</label>
					<input type="text" class="form-control" name="name" placeholder="Name">{{ $errors-> has('name') ? $errors->first('name') : ''}}<br>

					<label for="">{{ trans('rooms/create.desc')}}:</label>
					<input type="text" class="form-control" name="desc" placeholder="Desc"><br>

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
