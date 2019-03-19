@extends('master')

@section('title', 'User List Manage')

@section('body')
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
								@if($user->role == null)
									<td class="role-user">No Role</td>
								@elseif($user->role == 3)
									<td class="role-user">Admin</td>
								@elseif($user->role == 2)
									<td class="role-user">Technicians</td>
								@elseif($user->role == 1)
									<td class="role-user">Teacher</td>
								@elseif($user->role == 0)
									<td class="role-user">Student</td>
								@endif
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
@endsection