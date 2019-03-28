@extends('master')

@section('title', 'Room manage')



@section('body')

	<div>
	</div>
		<div class="container-fluid dange">

			<div class="form-group">

				<form action="{{ url('rooms') }}" method="POST">
					@csrf
		

					<label for="">{{ trans('rooms/create.name')}}:</label>

					<label class="alertroom" >{{ $errors-> has('name') ? $errors->first('name') :''}}</label>
					
					<input type="text" class="form-control  {{ $errors-> has('name') ? 'errors' :''}}"  name="name" placeholder="Name">

					<label for="">{{ trans('rooms/create.desc')}}:</label>

					<label class="alertroom" >{{ $errors-> has('desc') ? $errors->first('desc') :''}}</label>

					<input type="text" class="form-control  {{ $errors-> has('desc') ? 'errors' :''}}" name="desc" placeholder="Desc"><br>

					<label for="">{{ trans('rooms/create.status')}}:</label>

					<select name="status" class="form-control">

					@foreach(RoomsHelper::getOptionStatus() as $key => $value)
						<option value="{{$key}}">{{$value}}</option>
					@endforeach
					</select><br>
					<button id="create-rooms" type="sumbit" class="bt label-warning label">Sumbit</button>
				</form>

			</div>
		</div>
@endsection
