@extends('master')

@section('title', 'User List Manage')

@section('body')
	<div class="form-edit-user container-fluid">
		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>	
					@endforeach
				</ul>
			</div>
		@endif
		<form action="{{ url('users/'.$user->id) }}" method="POST">
			@csrf
			{{ method_field('put') }}
			<div class="form-group">
				<label for="">Username</label>
				<input type="text" class="form-control" name="username" value="{{ $user->username }}">
			</div>

{{-- 			@if($errors->has('username'))
				<div class="alert alert-danger">
					{{ $errors->first('username') }}
				</div>

			@endif --}}
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
					@foreach( UserHelper::getOptionRole() as $key => $value)
					
						<option value="{{ $key }}">{{ $value }}</option>

					@endforeach
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Edit</button>
			</div>
		</form>
	</div>
@endsection