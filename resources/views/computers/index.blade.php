@extends('master')

@section('title', 'Computers')

@section('body')	
    <h1>{{ trans('computer/ComputerIndex.title')}}</h1>
    <div class="container">
    <div>
        <button class="btn btn-danger"><a href="{{url('computers/create')}}">{{ trans('computer/ComputerIndex.add')}}</a></button>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ trans('computer/ComputerIndex.stt')}}</th>
                <th>{{ trans('computer/ComputerIndex.name')}}</th>
                <th>{{ trans('computer/ComputerIndex.desc')}}</th>
                <th>{{ trans('computer/ComputerIndex.status')}}</th>
                <th>{{ trans('computer/ComputerIndex.roomsID')}}</th>
                <th>{{ trans('computer/ComputerIndex.edit')}}</th>
                <th>{{ trans('computer/ComputerIndex.delete')}}</th>
            </tr>
        </thead>
        <?php $i = 0; ?>
    @foreach($computerList as $computer)
        <tbody>
            <tr>
                <td><?php echo ++$i; ?></td>
                <td>{{ $computer->name }}</td>
                <td>{{ $computer->desc }}</td>
                <td>{{ $computer->status }}</td>
                <td>{{ $computer->rooms_id }}</td>
                <td><button class="btn btn-danger"><a href="{{ url("computers/$computer->id/edit") }}">{{ trans('computer/ComputerIndex.edit')}}</a></button></td>
                <td>
                    <form action="{{url("computers/$computer->id")}}" method="POST" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}

                        <button class="btn btn-danger" type="submit" data-toggle="tooltip" title="Delete" data-placement="top" onclick="return confirm('bạn có thực sự muốn xóa ?'); ">{{ trans('computer/ComputerIndex.delete')}}</button>
                    </form>
                </td>
            </tr>
        </tbody>
    @endforeach
    </table>
    </div>

    
@endsection