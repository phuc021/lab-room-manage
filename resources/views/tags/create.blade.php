@extends('master')

@section('title', 'Tag manager')

@section('body')
		<div class="container">
			<div class="form-group">
				<form action="{{ url('tags') }}" method="POST">
					@csrf

					<p>
						<h3>
							<center>{{ trans('tags/langTag.create_new_tagTitle') }}</center>
						</h3>
					</p>
					<br>
					<label for="">{{ trans('tags/langTag.value')}}:</label>
					<input type="text" class="form-control" name="value" placeholder="ex: RTX 2080 Ti">{{ $errors-> has('value') ? $errors->first('value') : ''}}
					<br>
					
					{{-- không dùng input, dùng option --}}
					<label for="">{{ trans('tags/langTag.deviceid')}}:</label>
					<input type="text" class="form-control" name="devices_id" placeholder="">
					<br>

					<button class="btn btn-success" type="sumbit">{{trans('tags/langTag.submit')}}</button>
				</form>
			</div>
		</div>
@endsection
