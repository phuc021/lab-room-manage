@extends('master')

@section('title', 'Room manage')

@section('body')
   

    <div class="container-fluid">
           <h3 align="center">Tìm Kiếm</h3><br />   
       <div class="container-fluid">
             <input type="text" name="country_name" id="country_name" class="form-control input-lg" placeholder="Enter Country Name" />
            <div id="countryList"><br>
             </div>
        </div>  
    </div>

    <div class="container-fluid">
           <a href="{{ url('rooms/create') }}">
        <button id="add-new-rooms" type="button" class="btn btn-primary">Add New Rooms</button></a>

    <div class="contaiter-fluid text-center">
        @php($index = 0)
        <div class="row bgr-book">
            @foreach($roomsList as $rooms)
            @php($index++)
            <div class="col-lg-4 block">
                    <div class="row bgr-top-block">
                        <div class="col-lg-2 stt">
                            <p>{{ RoomsHelper::increment($index, $roomsList->perPage(), $roomsList->currentPage())}}</p>
                        </div>
                        <div class="col-lg-7 ">
                            <p>{{ RoomsHelper::getStatus($rooms->status)}}</p>
                                
                            </div>
                        <div class="col-lg-3">
                            <p>{{$rooms->desc}}</p>
                        </div>
                    </div>

                    <div class="row block-img">
                        <div class="col-lg-11 img-middle btn">
                            <img src="..\..\assets\img\phongmay.jpg" style="width: 293px;" alt="placeholder+image">
                        </div>

                        <div class="col-lg-6 middle cursor-pointer">
                            
                        </div>

                    </div>
                    <p>{{$rooms->name}}</p>
                    <div class="row">
                        <div id="button-option-edit-device" class="pull-left block-btn">
                            <button title="Edit" type="submit" value="Edit"><a href="{{ url('rooms') }}/{{$rooms->id}}/edit">Edit</a></button>
                    </div>

                    <div id="button-option-del-device" class="pull-right block-btn">
                            <form action="{{ url('rooms/'.$rooms->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" value="Delete"  title="Delete"  onclick="return confirm('bạn có muốn xóa?');">Delete</button>
                            </form>
                    </div>
                        
                </div>
            </div>
                
            @endforeach
        </div>
    
    </div>
        {{ $roomsList}}
        
            
               

    @endsection

        