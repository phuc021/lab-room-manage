@extends('master')

@section('title', ' List TypeDevices')
	

@section('body')

@section('title-bar', 'TypeDevices')
	

	<div class="container-fluid">
		<button id="add-new-user" class="btn btn-primary" type="button"><a href="{{ url('typedevices/create') }}">{{trans('+')}}</a></button>
	</div>

	<div class="container-fluid text-center">
		<table class="list-user">
			<thead>
				<tr>
					<th><center>STT</center></th>
					<th><center>NAME</center></th>
					<th><center>OPTION</center></th>


				</tr>
			</thead>
			@php($i = 0)
			@foreach($typedevicesList as $typedevice)
			<tbody>
				<tr @if($i% 2 == 0) class="old" @else class="even" @endif >
					<td><center><?php echo ++$i; ?></center></td>
					<td><center><p>{{$typedevice->name}}</p></center></td></p></td>

					<td>
						<a href="{{ url('typedevices/'.$typedevice->id.'/edit') }}" class="btn-option-user" title="Edit"><i class="fa fa-pencil-square-o text-info"></i></a>
						<form action="{{ url('typedevices/'.$typedevice->id) }}" method="POST">
							@csrf
							{{ method_field('DELETE') }}
							<button type="submit" title="Delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="btn-option-user"><i class="fa fa-trash text-danger"></i></button>
					</td>	
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $typedevicesList->links() }}
	</div>
@endsection