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
    </div><br>

    <div class="container-fluid">
           <a href="{{ url('rooms/create') }}">
        <button id="add-new-rooms" type="button" class="btn btn-primary">Add New Rooms</button></a>

    <div class="container-fluid text-center">
        <table class="list-room table-bordered">
    
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
                    <?php $index = 0; ?>
                    @foreach($roomsList as $rooms)
                <tr @if($index % 2 == 0) class="old" @else class="even" @endif>
                    <td>
                         @php($index++)
                         {{ RoomsHelper::increment($index, $roomsList->perPage(), $roomsList->currentPage())}}
                    </td>
                    <td>{{ $rooms->name }}</td>
                    <td>{{ $rooms->desc }}</td>
                    <td>{{ RoomsHelper::getStatus($rooms->status) }}</td>
                    <td id="button-option-edit-room">
                        <button class="button-room"> 
                        <a href="{{ url("rooms/$rooms->id/edit") }}">Edit</a>
                    </button></td>
                    <td id="button-option-del-room">
                        <form action="{{ url('rooms/'.$rooms->id) }}" method="POST"> 
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        
                           <button class="button-room" type="submit" data-toggle="tooltip" title="Delete" data-placement="top" onclick="return confirm('bạn có thực sự muốn xóa ?'); ">Delete</button>
                        </form>
                    </tr>
                </td>
            @endforeach
        </tbody>
    </table>
    </div>
 
<tbody>
<div class="contaiter-fluid text-center">
    @php($index = 0)
    <div class="row bgr-book">
        @foreach($roomsList as $Room)
        @php($index++)
        <div class="col-lg-4 block">
                <div class="row bgr-top-block">
                    <div class="col-lg-2 stt">
                        <p>{{ RoomsHelper::increment($index, $roomsList->perPage(), $roomsList->currentPage())}}</p>
                    </div>
                    <div class="col-lg-7 ">
                        <p>{{ RoomsHelper::getStatus($Room->status)}}</p>
                            
                        </div>
                    <div class="col-lg-3">
                        <p>{{$Room->desc}}</p>
                    </div>
                </div>

                <div class="row block-img">
                    <div class="col-lg-11 img-middle">
                        <img src="http://phongnet.com/wp-content/uploads/2015/10/lap-dat-phong-net-tai-kien-giang.jpg " style="width: 293px;" alt="placeholder+image">
                    </div>

                    <div class="col-lg-6 middle cursor-pointer">
                        
                        

                                                
                    </div>

                </div>
                <p>{{$Room->name}}</p>
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
</tbody>
    </div>
        {{ $roomsList}}
    
        
           

@endsection

        