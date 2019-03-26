@extends('master')

@section('title', 'TypeDevices')
	

@section('body')
	
	<h1 class="text-center" >{{trans('TYPEDEVICE')}}</h1>
	<div class="container-fluid">
		<button class="btn btn-default" value="Add"><a href="{{ url('typedevices/create') }}">{{trans('ADD')}}</a></button>
		
	</div>
	<div class="container-fluid text-center">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Stt</th>
					<th>Name</th>
					<th>Edit</th>
					<th>Delete</th>

				</tr>
			</thead>
			<?php $i = 0; ?>
			<tbody>
				@foreach($typedevicesList as $typedevice)
				<tr>
					<td><?php echo ++$i; ?></td>
					<td><p>{{$typedevice->name}}</p></td></p></td>

					<td><button class="btn btn-default" title="Edit" type="submit" value="Edit"><a href="{{ url('typedevices') }}/{{$typedevice->id}}/edit">Edit</a></button></td>
					<td>
						<form action="{{ url('typedevices/'.$typedevice->id) }}" method="POST">
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