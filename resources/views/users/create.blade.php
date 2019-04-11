@extends('master')

@section('title', 'Create User Page')

@section('body')

	<div class="form-user container-fluid">
{{-- 		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>	
					@endforeach
				</ul>
			</div>
		@endif --}}
		<form action="{{ url('users') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="">Username :</label>
				<input type="text" name="username" class="form-control" required="required">
			</div>
			@if($errors->has('username'))
				<div class="alert alert-danger">
					{{ $errors->first('username') }}
				</div>
			@endif
			<div class="form-group">
				<label for="">Password :</label>
				<input type="password" name="password" class="form-control" required="required">
			</div>
			@if($errors->has('password'))
				<div class="alert alert-danger">
					{{ $errors->first('password') }}
				</div>
			@endif
			<div class="form-group">
				<label for="">Confirm password :</label>
				<input type="password" name="password_confirmation" class="form-control" required="required">
			</div>
			@if($errors->has('password_confirmation'))
				<div class="alert alert-danger">
					{{ $errors->first('password_confirmation') }}
				</div>
			@endif
			<div class="form-group">
				<label for="">Full name :</label>
				<input type="text" name="name" class="form-control" required="required">
			</div>
			@if($errors->has('name'))
				<div class="alert alert-danger">
					{{ $errors->first('name') }}
				</div>
			@endif
			<div class="form-group">
				<label for="">Email :</label>
				<input type="email" name="email" class="form-control" required="required">
			</div>
			@if($errors->has('email'))
				<div class="alert alert-danger">
					{{ $errors->first('email') }}
				</div>
			@endif
			<div class="form-group">
				<button id="btn-form-user" type="submit" class="btn btn-primary">Create</button>
			</div>
		</form>		
	</div>
@endsection