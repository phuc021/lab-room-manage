@extends('master')

@section('title', 'Task Manager')

@section('body')
	<div class="container-fluid">
		<div class="from-group">
			<form action="{{ url('tasks/'.$tasks->id) }}" method="POST">
				@csrf
				{{ method_field('put') }}

				<label>ID:</label>
				<label >Name:</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" value="{{$tasks->name}}" placeholder="Enter Name" name="name">



				<button type="submit" class="btn btn-default edi-sub">Edit</button>
			</form>
		</div>
	</div>

@endsection