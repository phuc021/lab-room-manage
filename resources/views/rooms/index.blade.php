@extends('master')

@section('title', 'Room manage')

@section('body')
    
@section('title-bar', trans('rooms/index.title')) 
    <div class="container-fluid">
        {{-- add button --}}
        <a href="{{url('rooms/create')}}">
            <button id="add-new-user" class="btn btn-primary">+</button>
        </a>
        
        <div class="row">
            @php($i = 0)
            @foreach($roomsList as $rooms)
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                <div class="wrap-item">
                    <div class="row bottom-grid">   
                        <div class="img-middle room">
                            <div class="row">
                                <div class="col-xs-3">
                                    <p><b>ID:
                                        @php($i++)
                                        {{ RoomsHelper::increment($i , $roomsList->perPage(), $roomsList->currentPage()) }}</b>
                                    </p>
                                </div>
                                <div class="col-xs-6">
                                    <p><b>{{ RoomsHelper::getStatus($rooms->status)}}</b></p>
                                </div>
                                <div class="col-xs-3">
                                    <p><b>{{$rooms->desc}}</b></p>
                                </div>
                            </div>
                            {{-- image --}}
                            <img src="{{ asset('img/rooms.jpg') }}" style="width: 280px" alt="placeholder+image">
                            {{-- button --}}
                            <div class="text-center"><b>{{ $rooms->name }}</b></div>
                            <div class="row btn-computer">
                                {{-- edit button --}}
                                <div >
                                    <button class="button-edit-room pull-left"><a href="{{ url("rooms/$rooms->id/edit") }}"><i id="room-ion" class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                </div>
                                {{-- delete button --}}
                                <div >
                                    <form action="{{ url('rooms/'.$rooms->id) }}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}

                                        <button class="button-delete-room pull-right"  type="submit" data-toggle="tooltip" title="Delete" data-placement="top" onclick="return confirm('bạn có thực sự muốn xóa ?'); "><i id="room-ion" class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 bgr room">
                            <p>
                                <b>{{ trans('rooms/create.desc')}}:{{$rooms->desc}}</b>
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination-computer">
            {{ $roomsList->links() }}
        </div>
    </div> 
    

   
    @endsection

        