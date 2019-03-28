@extends('master')

@section('title', 'Computers')

@section('body')	
    
    

    <div class="container-fluid text-center">
        <h1>{{ trans('computer/index.title')}}</h1>
    <div>
        <button id="add-new-computer" ><a href="{{url('computers/create')}}">{{ trans('computer/index.add')}}</a></button>
    </div>
        <div class="row">
            @php($i = 0)
            @foreach($computerList as $computer)
            <div class="col-lg-4">
                <div class="wrap-item">
                    <div class="row top-grid">
                        <div class="col-lg-2">
                            <p>
                                @php($i++)
                                {{ ComputerHelper::increment($i, $computerList->perPage(), $computerList->currentPage())}}
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <p>{{ $computer->name }}</p>
                        </div>
                        <div class="col-lg-4">
                            <p>{{ ComputerHelper::getStatus( $computer->status )}}</p>
                        </div>
                    </div>

                    <div class="row bottom-grid">   
                        <div class="img-middle">
                            <img src="..\..\assets\img\desktop.jpg" style="width: 335px;" alt="placeholder+image">
                        </div>
                        <div class="col-lg-12 bgr">
                            <p>{{ $computer->rooms_id }}</p>
                        </div>
                    </div>

                    <p>{{$computer->desc}}</p>

                    <div class="row">
                        <div class="button-option-edit-computer pull-left"><button><a href="{{ url("computers/$computer->id/edit") }}">{{ trans('computer/index.edit')}}</a></button></div>
                        <div class="button-option-delete-computer pull-right">
                            <form action="{{url("computers/$computer->id")}}" method="POST" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}

                                <button type="submit" data-toggle="tooltip" title="Delete" data-placement="top" onclick="return confirm('bạn có thực sự muốn xóa ?'); ">{{ trans('computer/index.delete')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination-computer">
            {{ $computerList->links() }}
        </div>
    </div>
   
    
@endsection