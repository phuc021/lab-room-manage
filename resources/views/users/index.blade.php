@extends('master')

@section('title', 'User List Manage')

@section('body')
	<a href="{{ url('users/create') }}">
	<button id="add-new-user" type="button" class="btn btn-primary">Add New User</button></a>
	<table class="list-user">
		<thead>
			<tr>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Role</th>
				<th>Option</th>
			</tr>
		</thead>
		@php ($index = 0)
		@foreach($userList as $user)
			<tbody>
				<tr @if($index % 2 == 0) class="old" @else class="even" @endif>
					@php ($index++)
					<td>{{ $user->name }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>	
					<td class="role-user">{{  UserHelper::getRole($user->role) }}</td>
					<td id="button-option-user">
						<a href="{{ url('users/'.$user->id.'/edit') }}"><button type="button" class="btn btn-info">Edit</button></a>
						<form action="{{ url("users/$user->id") }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('delete') }}
						<button id="button-delete-user" type="submit" title="Delete" data-placement="top" onclick="return confirm('Xoa ???'); " class="btn btn-warning">Delete</button>
					</form>
					</td>
				</tr>
			</tbody>
		@endforeach
	</table>
	<div class="pagination-user">
		{{ $userList->links() }}
	</div>
@endsection