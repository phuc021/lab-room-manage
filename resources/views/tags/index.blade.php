@extends('master')

@section('title', 'Tags manager')

@section('body')
<center>
    <h2>Tags</h2>

</center>
<div class="container">
        <button class="btn btn-default"><a href="{{url('tags/create')}}">{{trans('tags/langTag.addnew')}}</a></button>
    </div>
	 <br>
        <table class="table table-bordered">
    
    <thead>
        <tr>
            <th>{{trans('tags/langTag.stt')}}</th>
            <th>{{trans('tags/langTag.value')}}</th>
            <th>{{trans('tags/langTag.deviceid')}}</th>
            <th>{{trans('tags/langTag.edit')}}</th>
            <th>{{trans('tags/langTag.del')}}</th>
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
            <td><a href="{{ url("tags/$tags->id/edit") }}">{{trans('tags/langTag.edit')}}</a></td>
            <td>
                <form action="{{ url('tags/'.$tags->id) }}" method="POST"> 
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                
                   <button class="btn btn-danger" type="submit" data-toggle="tooltip" title="Delete" data-placement="top" onclick="return confirm('{{trans('tags/langTag.confirmDel')}}'); ">{{trans('tags/langTag.del')}}</button>
                </form>
        </tr>
    </td>
        @endforeach
    </tbody>
</table>
    {{ $tagsList->links() }}

@endsection