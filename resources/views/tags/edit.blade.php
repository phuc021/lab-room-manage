@extends('master')

@section('title', 'Tag manager')

@section('body')

	<div class="container">
			<div class="form-group">
				<form action="{{ url('tags/'.$tags->id) }}" method="POST">
				@csrf
				{{method_field('put') }}
				<p>
					<h3>
						<center>{{trans('tags/langTag.editTitle')}}&nbsp {{trans('tags/langTag.value')}}:&nbsp<b>{{ $tags->value }}</b></center>
					</h3>
				</p><br><br>
				<label for="">{{trans('tags/langTag.value')}}:</label>
				
				<input type="text" class="sm"  name="value" value="{{ $tags->value }}" required="required">
				<br>
				<label for="devices_id">{{trans('tags/langTag.deviceName')}}:</label>
				
				<select name="devices_id" class="sm" >
					@foreach(TagHelper::getOptionStatus() as $key => $value)
						<option value="{{$key}}">{{$value}}</option>
					@endforeach
					</select>
				<br>
					<button id="submit" class="btn btn-success" type="sumbit" >{{trans('tags/langTag.submit')}}</button>
					{{-- <button id="submit" class="btn btn-success" type="sumbit" onclick="return confirm('{{trans('tags/langTag.confirmEdit')}}{{ $tags->value }}'); ">{{trans('tags/langTag.submit')}}</button> --}}
				</form>
			</div>
		</div>
@endsection
