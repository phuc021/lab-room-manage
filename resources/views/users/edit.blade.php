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
			<label for="">Role</label>
			<select name="role" class="form-control">
				@if($user->role == null)
					<option value="" selected>-- Select Role --</option>
					<option value="3">Admin</option>
					<option value="2">Technicians</option>
					<option value="1">Teacher</option>
					<option value="0">Student</option>
				@elseif($user->role == 3)
					<option value="">-- Select Role --</option>
					<option value="3" selected>Admin</option>
					<option value="2">Technicians</option>
					<option value="1">Teacher</option>
					<option value="0">Student</option>
				@elseif($user->role == 2)
					<option value="">-- Select Role --</option>
					<option value="3">Admin</option>
					<option value="2" selected>Technicians</option>
					<option value="1">Teacher</option>
					<option value="0">Student</option>
				@elseif($user->role == 1)
					<option value="">-- Select Role --</option>
					<option value="3">Admin</option>
					<option value="2">Technicians</option>
					<option value="1" selected>Teacher</option>
					<option value="0">Student</option>
				@elseif($user->role == 0)
					<option value="">-- Select Role --</option>
					<option value="3">Admin</option>
					<option value="2">Technicians</option>
					<option value="1">Teacher</option>
					<option value="0" selected>Student</option>
				@endif
			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Edit</button>
		</div>
	</form>
@endsection