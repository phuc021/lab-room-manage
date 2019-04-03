@extends('master')

@section('title', ' List TypeDevices')
	

@section('body')
	
	<h1 class="text-center" >{{trans('TYPEDEVICE')}}</h1>

	<div class="container-fluid">
		<button id="add-new-tdv" class="btn btn-default add-new-tdv" value="Add"><a href="{{ url('typedevices/create') }}">{{trans('ADD')}}</a></button>
	</div>

	<div class="container-fluid text-center">
		<table class="table table-bordered list-typedevice">
			<thead>
				<tr>
					<th><center>Stt</center></th>
					<th><center>Name</center></th>
					<th><center>Edit</center></th>
					<th><center>Delete</center></th>

				</tr>
			</thead>
			@php($i = 0)
			@foreach($typedevicesList as $typedevice)
			<tbody>
				<tr @if($i% 2 == 0) class="old" @else class="even" @endif >
					<td><?php echo ++$i; ?></td>
					<td><p>{{$typedevice->name}}</p></td></p></td>

					<td id="button-option-edi-tdv"><button class="btn btn-default" title="Edit" type="submit" value="Edit"><a href="{{ url('typedevices') }}/{{$typedevice->id}}/edit">Edit</a></button></td>
					<td id="button-option-del-tdv">
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
		{{ $typedevicesList->links() }}
	</div>
@endsection