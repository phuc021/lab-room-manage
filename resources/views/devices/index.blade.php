@extends('master')

@section('title', 'Devices')
	

@section('body')
	
	<h1 class="text-center" >{{trans('devices/index.title')}}</h1>
	<div class="container-fluid">
		<button class="btn btn-default" value="Add"><a href="{{ url('devices/create') }}">{{trans('devices/index.Add')}}</a></button>
		
	</div>
	<div class="container-fluid text-center">
		<table class="table table-bordered">
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
				@foreach($devicesList as $device)
				<tr>
					<td><?php echo ++$i; ?></td>
					<td><p>{{$device->name}}</p></td>
					<td><p>{{$device->desc}}</p></td>
					<td><p>{{ DeviceHelper::getStatus($device->status)}}</p></td>
					<td><p>{{$device->computers_id}}</p></td>
					<td><p>{{$device->type_devices_id}}</p></td>
					<td><button class="btn btn-default" title="Edit" type="submit" value="Edit"><a href="{{ url('devices') }}/{{$device->id}}/edit">Edit</a></button></td>
					<td>
						<form action="{{ url('devices/'.$device->id) }}" method="POST">
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