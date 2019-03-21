@extends('master')

@section('title', 'Tags manager')

@section('body')
<center>
    <h2>Tags</h2>

</center>
<div class="container">
        <button class="btn btn-default"><a href="{{url('tags/create')}}">Add new</a></button>
    </div>
	 <br>
        <table class="table table-bordered">
    
    <thead>
        <tr>
            <th>Serial</th>
            <th>Value</th>
            <th>Device ID</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0; ?>
        @foreach($tagsList as $tags)
        <?php $i = $i + 1; ?>
        <tr>
            <td>{{$i}}</td>
            <td>{{ $tags->value }}</td>
            <td>{{ $tags->devices_id }}</td>
            <td><a href="{{ url("tags/$tags->id/edit") }}">Edit</a></td>
            <td>
                <form action="{{ url('tags/'.$tags->id) }}" method="POST"> 
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                
                   <button class="btn btn-danger" type="submit" data-toggle="tooltip" title="Delete" data-placement="top" onclick="return confirm('bạn có thực sự muốn xóa ?'); ">Delete</button>
                </form>
        </tr>
    </td>
        @endforeach
    </tbody>
</table>

@endsection