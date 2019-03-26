@extends('master')

@section('title', 'Room manage')


@section('body')

	<div class="container-fluid roomList text-center>
			<div class="form-group">
				<form class="bo" action="{{ url('rooms/'.$rooms->id) }}" method="POST">

				@csrf
				{{method_field('put') }}
				
				<label for="">{{ trans('rooms/create.name')}}:</label>

				<label class="alertroom" >{{ $errors-> has('name') ? $errors->first('name') :''}}</label>

				<input type="text" class="form-control  {{ $errors-> has('name') ? 'errors' :''}}" value="{{ $rooms->name }}" name="name" placeholder="Name">

				<label for="">{{ trans('rooms/create.desc')}}:</label>

				<label class="alertroom" >{{ $errors-> has('desc') ? $errors->first('desc') :''}}</label>

				<input type="text" class="form-control  {{ $errors-> has('desc') ? 'errors' :''}}" value="{{ $rooms->desc }}" name="desc" placeholder="Desc">
				<label for="">{{ trans('rooms/create.status')}}:</label>
				
				<select name="status" class="form-control">
					@foreach(RoomsHelper::getOptionStatus() as $key => $value)
						<option value="{{$key}}">{{$value}}</option>
					@endforeach
				</select><br>
						<button class="bt label-warning edit" type="sumbit">Sumbit</button>
					
				</form>
			</div>
		</div>
@endsection
