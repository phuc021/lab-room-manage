@extends('master')

@section('title', 'User List Manage')

@section('body')
	<form action="{{ url('users/'.$user->id) }}" method="POST">
		@csrf
		{{ method_field('put') }}
		<div class="form-group">
			<label for="">Username</label>
			<input type="text" class="form-control" name="username" value="{{ $user->username }}">
		</div>
		<div class="form-group">
			<label for="">Password</label>
			<input type="password" class="form-control" name="password" value="{{ $user->password }}">
		</div>
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" class="form-control" name="name" value="{{ $user->name }}">
		</div>
		<div class="form-group">
			<label for="">Email</label>
			<input type="email" class="form-control" name="email" value="{{ $user->email }}">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Edit</button>
		</div>
	</form>
@endsection