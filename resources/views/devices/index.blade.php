@extends('master')

@section('title', 'List Devices')
	 
@section('body')
	
	<h1 class="text-center font-bold" >{{trans('devices/index.title')}}</h1>
	<div class="container-fluid">
		<a href="{{ url('devices/create') }}">
		<button id="add-new-device" type="button" class="btn btn-primary" value="Add">{{trans('devices/index.Add')}}</a></button>
		
	</div>
	<div class="container-fluid text-center">
		<table class="table table-bordered list-device">
			<thead>
				<tr>
					<th>Stt</th>
					<th>Name</th>
					<th>Desc</th>
					<th>Status</th>
					<th>Computers</th>
					<th>Type Devices</th>
					<th>Edit</th>
					<th>Delete</th>

				</tr>
			</thead>

			@php($i = 0)
			@foreach($devicesList as $device)
			<tbody>
				
				<tr @if($i% 2 == 0) class="old" @else class="even" @endif>
					@php($i++)
					<td>{{ DeviceHelper::increment($i, $devicesList->perPage(), $devicesList->currentPage())}}</td>
					<td><p>{{$device->name}}</p></td>
					<td><p>{{$device->desc}}</p></td>
					<td><p>{{ DeviceHelper::getStatus($device->status)}}</p></td>
					<td><p>{{$device->computer_id}}</p></td>
					<td><p>{{$device->type_devices_id}}</p></td>
					<td id="button-option-edit-device">
						<button title="Edit" type="submit" value="Edit"><a href="{{ url('devices') }}/{{$device->id}}/edit">Edit</a></button></td>
					<td id="button-option-del-device">
						<form action="{{ url('devices/'.$device->id) }}" method="POST">
			 				@csrf
							{{ method_field('DELETE') }}
							<button type="submit" value="Delete"  title="Delete"  onclick="return confirm('bạn có muốn xóa?');">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $devicesList->links() }}
	</div>
	
		
@endsection