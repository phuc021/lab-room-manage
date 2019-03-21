@extends('master')

@section('title', 'Computers')

@section('body')	
    <h1>{{ trans('computer/index.title')}}</h1>
    <div class="container-fluid">
    <div>
        <button class="btn btn-danger active"><a href="{{url('computers/create')}}">{{ trans('computer/index.add')}}</a></button>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ trans('computer/index.stt')}}</th>
                <th>{{ trans('computer/index.name')}}</th>
                <th>{{ trans('computer/index.desc')}}</th>
                <th>{{ trans('computer/index.status')}}</th>
                <th>{{ trans('computer/index.roomsID')}}</th>
                <th>{{ trans('computer/index.edit')}}</th>
                <th>{{ trans('computer/index.delete')}}</th>
            </tr>
        </thead>
        <?php $i = 0; ?>
    @foreach($computerList as $computer)
        <tbody>
            <tr>
                <td><?php echo ++$i; ?></td>
                <td>{{ $computer->name }}</td>
                <td>{{ $computer->desc }}</td>
                <td>{{ ComputerHelper::getStatus( $computer->status )}}</td>
                <td>{{ $computer->rooms_id }}</td>
                <td><button class="btn btn-danger active"><a href="{{ url("computers/$computer->id/edit") }}">{{ trans('computer/index.edit')}}</a></button></td>
                <td>
                    <form action="{{url("computers/$computer->id")}}" method="POST" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}

                        <button class="btn btn-danger active" type="submit" data-toggle="tooltip" title="Delete" data-placement="top" onclick="return confirm('bạn có thực sự muốn xóa ?'); ">{{ trans('computer/index.delete')}}</button>
                    </form>
                </td>
            </tr>
        </tbody>
    @endforeach
    </table>
    </div>

    
@endsection