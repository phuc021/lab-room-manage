@extends('master')

@section('title', 'User List Manage')

@section('body')
	<a href="{{ url('users/create') }}">
	<button type="button" class="btn btn-primary">Add New User</button></a>
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
		@foreach($userList as $user)
			<tbody>
				<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>	
					<td class="role-user">{{  UserHelper::getRole($user->role) }}</td>
					<td>
						<a href="{{ url('users/'.$user->id.'/edit') }}"><button type="button" class="btn btn-info">Edit</button></a>
						<form action="{{ url("users/$user->id") }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('delete') }}
						<button type="submit" title="Delete" data-placement="top" onclick="return confirm('Xoa ???'); " class="btn btn-warning">Delete</button>
					</form>
					</td>
				</tr>
			</tbody>
		@endforeach
	</table>
	{{ $userList->links() }}
@endsection