@extends('master')

@section('title','Task List Manage')

@section('body')

	
	<h1 class="text-center" >{{trans('TASK')}}</h1>

	<div class="container-fluid">
		<button id="add-new-tdv" class="btn btn-default add-new-tdv" value="Add"><a href="{{ url('tasks/create') }}">{{trans('ADD')}}</a></button>
	</div>

	<div class="container-fluid text-center">
		<table class="table table-bordered list-typedevice">
			<thead>
				<tr>
					<th><center>Stt</center></th>
					<th><center>ID</center></th>
					<th><center>Name</center></th>
					<th><center>Edit</center></th>
					<th><center>Delete</center></th>
					

				</tr>
			</thead>
			@php($i = 0)
			@foreach($tasksList as $taskList)
				<tbody>
					<tr @if($i% 2 == 0) class="old" @else class="even" @endif >
						<td><?php echo ++$i; ?></td>
						<td><p>{{ $taskList->id }}</p></td>
						<td><p>{{ $taskList->name }}</p></td></p></td>

						<td id="button-option-edi-tdv"><button class="btn btn-default" title="Edit" type="submit" value="Edit"><a href="{{ url('tasks') }}/{{$taskList->id}}/edit">Edit</a></button></td>
						<td id="button-option-del-tdv">
							<form action="{{ url('tasks/'.$taskList->id) }}" method="POST">
								@csrf
								{{ method_field('DELETE') }}
								<button class="btn btn-danger" type="submit" value="Delete"  title="Delete"  onclick="return confirm('bạn có muốn xóa?');">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
		</table>
		{{ $tasksList->links() }}
	</div>	

@endsection 
