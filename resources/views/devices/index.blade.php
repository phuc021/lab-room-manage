@extends('master')

@section('title', 'List Devices')
	 
@section('body')
@section('title-bar',trans('devices/index.title'))
	<a href="{{ url('devices/create') }}">
		<button id="add-new-device" type="button" class="btn btn-primary">+</button>
	</a>
	<div class="container-fluid text-center">
		<table class="table boder">

			<thead>
				<tr>
					<th>Stt</th>
					<th>Name</th>
					<th>Desc</th>
					<th>Status</th>
					<th>Computers</th>
					<th>Type Devices</th>
					<th>Option</th>
				</tr>
			</thead>
			@php($i = 0)
			@foreach($devicesList as $device)
			<tbody>
				<tr @if($i% 2 == 0) class="old" @else class="even" @endif >
					@php($i++)
					<td>{{ DeviceHelper::increment($i, $devicesList->perPage(), $devicesList->currentPage())}}</td>
					<td><p>{{$device->name}}</p></td>
					<td><p>{{$device->desc}}</p></td>
					<td><p>{{ DeviceHelper::getStatus($device->status)}}</p></td>
					<td><p>{{$device->computers_id}}</p></td>
					<td><p>{{$device->type_devices_id}}</p></td>
					<td>
						<div class="row">
							<div class="col-md-3 col-md-push-2">
								<button class="edt" title="Edit" type="submit" value="Edit"><a  href="{{ url('devices') }}/{{$device->id}}/edit">Edit</a></button>
							</div>
							<div class="col-md-3 col-md-push-2">
								<form action="{{ url('devices/'.$device->id) }}" method="POST">
					 				@csrf
									{{ method_field('DELETE') }}
									<button class="del" type="submit" value="Delete"  title="Delete"  onclick="return confirm('bạn có muốn xóa?');">Delete</button>
								</form>
							</div>
						</div>
						
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="pagination-l">
			{{ $devicesList->links() }}
		</div>
	</div>
		
	
		
@endsection