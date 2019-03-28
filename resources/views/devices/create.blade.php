@extends('master')

@section('title', 'Add New Devices')
	
@section('body')

	<div class="container-fluid vip">
		<div class="from-group">
			<h3 class="text-center font-bold">Add new devices</h3>
			<form action="{{url('devices')}}" method="post">
				@csrf

				<label for="name">Name:</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" placeholder="Enter Name" name="name" id="name">

				<label for="desc">Description:</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control {{ $errors->has('desc') ? 'has-error' : ''}}" placeholder="Enter description" name="desc">

				<label for="">Status:</label>
				<select name="status" class="form-control">
					@foreach(DeviceHelper::getOptionStatus() as $key => $value)
						<option value="{{$key}}">{{$value}}</option>
					@endforeach
				</select><br>
				
				<label for="">Rooms:</label>				
				<select id="rooms_id" onchange="setComputers(this)" name="rooms_id" class="form-control">
					@foreach($roomList as $room)
						<option value="{{$room->id}}">{{$room->name}}</option>
					@endforeach
				</select><br>
				<label for="">Computer:</label>
				<select id="computers_id" name="computers_id" class="form-control">
					
				</select><br>

				<button type="submit" class="btn btn-default cre-sub">Add New</button>
			</form>
		</div>
	</div>	
	<script type="text/javascript">
		var jsonComputerList = '<?php echo json_encode($computerList); ?>';
		var computerList = JSON.parse(jsonComputerList);		

		function setComputers(selectObj){
			var idx = selectObj.selectedIndex; 
			// get the value of the selected option 
			var roomId = selectObj.options[idx].value; 
			console.log(roomId);

			selectList = document.getElementById("computers_id");
			for (var i = 0; i < computerList.length; i++) {
				if(computerList[i].status == roomId){
					var option = document.createElement("option");
				    option.value = computerList[i].id;
				    option.text = computerList[i].name;
				    selectList.appendChild(option);
				}			    
			}
		}
	</script>
@endsection