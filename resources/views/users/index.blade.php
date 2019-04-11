@extends('master')

@section('title', 'User List Manage')
@section('title-bar', 'User')
@section('body')
	<a href="{{ url('users/create') }}">
		<button id="add-new-user" type="button" class="btn btn-primary">+</button>
	</a>
	<table class="list-user">
		@if(session('add'))
			<div class="alert alert-success alert-dismissible notif-user">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ session('add') }}
			</div>
		@elseif(session('edit'))
			<div class="alert alert-info alert-dismissible notif-user">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ session('edit') }}
			</div>
		@elseif(session('delete'))
			<div class="alert alert-danger alert-dismissible notif-user">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ session('delete') }}
			</div>
		@endif
		<thead>
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Role</th>
				<th>Option</th>
			</tr>
		</thead>
		@php ($index = 0)
		@php ($i = 0)
		@foreach($userList as $user) 
			<tbody>
				<tr @if($index % 2 == 0) class="old" @else class="even" @endif>
					@php ($index++)
					<td class="stt-user">
						@php($i++) 
						{{ UserHelper::increment($i, $userList->perPage(), $userList->currentPage())}}
					</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>	
					<td class="role-user">{{ UserHelper::getRole($user->role) }}</td>
					<td>
						<a href="{{ url('users/'.$user->id.'/edit') }}" class="btn-option-user" title="Edit"><i class="fa fa-pencil-square-o text-info"></i></a>
						<form action="{{ url("users/$user->id") }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('delete') }}
							<button type="submit" title="Delete" onclick="return confirm('Xoa ???');" class="btn-option-user"><i class="fa fa-trash text-danger"></i></button>
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