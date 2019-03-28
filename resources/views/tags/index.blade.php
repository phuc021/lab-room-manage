@extends('master')

@section('title', 'Tags manager')

@section('body')
<center>
    <h2>Tags</h2>

</center>

    <a href="{{url('tags/create')}}">
        <button id="add-new-user" type="button" class="btn btn-primary">{{trans('tags/langTag.addnew')}}</button></a>
	 <br>
        <table class="list-user">
    <thead>
        <tr>
           {{--  <th>@sortablelink('{{trans('tags/langTag.stt')}}')</th> --}}
           <th>{{trans('tags/langTag.stt')}}</th>
            <th>{{trans('tags/langTag.value')}}</th>
            <th>{{trans('tags/langTag.deviceName')}}</th>
            <th>{{trans('tags/langTag.option')}}</th>
        </tr>
    </thead>
    <tbody>
        @php ($i = 0)
        @foreach($tagsList as $tags)
        <tr @if( $i % 2 == 0) class="old" @else class="even" @endif >
            <td>
                @php ($i++)
                {{TagHelper::increment($i, $tagsList->perPage(), $tagsList->currentPage())}}
            </td>

            <td>{{ $tags->value }}</td>
            <td>{{ TagHelper::getStatus($tags->devices_id) }}</td>
            <td id="button-option-user"><a href="{{ url("tags/$tags->id/edit") }}"><button type="button" class="btn btn-info">{{trans('tags/langTag.edit')}}</button></a>
                <form action="{{ url('tags/'.$tags->id) }}" method="POST"> 
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }} 
                   <button id="button-delete-user" class="btn btn-warning" type="submit" data-toggle="tooltip" title="Delete" data-placement="top" onclick="return confirm('{{trans('tags/langTag.confirmDel')}}{{ $tags->value }}'); ">{{trans('tags/langTag.del')}}</button>
                </form>
        </tr>
    </td>
        @endforeach
    </tbody>
</table>
    <div class="pagination-user">
        {{ $tagsList->links() }}
    </div>

@endsection