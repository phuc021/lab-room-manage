@extends('master')

@section('title', 'Room manage')

@section('body')
<center>
    <h2>Rooms</h2>
</center>
<div class="container-fluid">
        <button class="btn btn-primary"><a href="{{url('rooms/create')}}">Add new</a></button>
    </div><br>
   
	 
        <table class="table table-bordered">
    
    <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>desc</th>
            <th>status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0; ?>
        @foreach($roomsList as $rooms)
        <?php $i = $i + 1; ?>
        <tr>
            <td>{{$i}}</td>
            <td>{{ $rooms->name }}</td>
            <td>{{ $rooms->desc }}</td>
            <td>{{ RoomsHelper::getStatus($rooms->status) }}</td>
            <td><button class="btn btn-secondary"> 
                <a href="{{ url("rooms/$rooms->id/edit") }}">Edit</a>
            </button></td>
            <td>
                <form action="{{ url('rooms/'.$rooms->id) }}" method="POST"> 
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                
                   <button class="btn btn-primary" type="submit" data-toggle="tooltip" title="Delete" data-placement="top" onclick="return confirm('bạn có thực sự muốn xóa ?'); ">Delete</button>
                </form>
        </tr>
    </td>
        @endforeach
    </tbody>
</table>

@endsection