@extends('master')

@section('title', 'Task Manager')

@section('body')
		<div class="container">
			<div class="form-group">
				<form action="{{ url('tags') }}" method="POST">
					@csrf
					<p>
						<h3>
							<center>{{ trans('tasks/langtask.name') }}</center>
						</h3>
					</p>
					<br>
					<label for="">{{ trans('tasks/langtask.value')}}:</label>
					@if($errors->has('value'))
						<div class="alert alert-danger">
							{{ $errors->first('value') }}
						</div>
					@endif
				</form>
			</div>
		</div>
@endsection
