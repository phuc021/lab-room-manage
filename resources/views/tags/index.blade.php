@extends('master')

@section('title', 'Tags manager')
@section('title-bar', trans('tags/langTag.title'))
@section('body')

<a href="{{url('tags/create')}}">
    <button id="addBtn" type="button" class="btn btn-primary">+</button></a>
    <br>
    @if(session('add'))
    <div class="alert alert-success alert-dismissible notif-user">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('add') }}
    </div>
    @elseif(session('edit'))
    <div class="alert alert-info alert-dismissible notif-user">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('edit') }}
    </div>
    @elseif(session('delete'))
    <div class="alert alert-danger alert-dismissible notif-user">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('delete') }}
    </div>
    @endif
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

            <td>
                <a href="{{ url('tags/'.$tags->id.'/edit') }}" class="btn-option-user" title="{{ trans('tags/langTag.edit') }}"><i class="fa fa-pencil-square-o text-info"></i></a>
                <form action="{{ url("tags/$tags->id") }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button type="submit" title="{{ trans('tags/langTag.del') }}" onclick="return confirm('{{trans('tags/langTag.confirmDel')}}{{ $tags->value }}');" class="btn-option-user"><i class="fa fa-trash text-danger"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination-user">
    {{ $tagsList->links() }}
</div>

@endsection
