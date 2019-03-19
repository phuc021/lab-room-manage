@extends('master')

@section('title', 'Devices')

@section('body')	
	
	<h1 class="text-center" >{{trans('devices/DevicesIndex.title')}}</h1>
	<div class="container">
		<button class="btn btn-default" value="Add"><a href="{{ url('devices/create') }}">{{trans('devices/DevicesIndex.Add')}}</a></button>
		
	</div>
	<div class="container text-center">
		<table class="table-bordered">
		<thead>
			<tr>
				<th>Stt</th>
				<th>Name</th>
				<th>Desc</th>
				<th>Status</th>
				<th>Computers_id</th>
				<th>Type_devices_id</th>
				<th>Edit</th>
				<th>Delete</th>

			</tr>
		</thead>
		<?php $i = 0; ?>
		<tbody>
			@foreach($devicesList as $devices)
			<tr>
				<td><?php echo ++$i; ?></td>
				<td><p>{{$devices->name}}</p></td>
				<td><p>{{$devices->desc}}</p></td>
				<td><p>{{$devices->status}}</p></td>
				<td><p>{{$devices->computers_id}}</p></td>
				<td><p>{{$devices->type_devices_id}}</p></td>
				<td><button class="btn btn-default" title="Edit" type="submit" value="Edit"><a href="{{ url('devices') }}/{{$devices->id}}/edit">Edit</a></button></td>
				<td>
					<form action="{{ url('devices/'.$devices->id) }}" method="POST">
						@csrf
						{{ method_field('DELETE') }}
						<button class="btn btn-danger" type="submit" value="Delete"  title="Delete"  onclick="return confirm('bạn có muốn xóa?');">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
		
	</div>
@endsection