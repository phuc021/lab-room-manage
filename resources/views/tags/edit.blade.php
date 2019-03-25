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
						<center>{{trans('tags/langTag.editTitle')}}&nbsp{{trans('tags/langTag.value')}}:&nbsp{{ $tags->value }}</center>
					</h3>
				</p>
				<label for="">{{trans('tags/langTag.value')}}:</label>
				
				<input type="text" class="form-control" name="value" value="{{ $tags->value }}">

				<label for="">{{trans('tags/langTag.deviceid')}}:</label>
				
				{{-- không dùng input, dùng option --}}
				<input type="text" class="form-control" name="devices_id" value="{{ $tags->devices_id }}">
				<br>
					<button class="btn btn-success" type="sumbit">{{trans('tags/langTag.submit')}}</button>
				</form>
			</div>
		</div>
@endsection
