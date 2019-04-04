<?php

namespace App\Http\Controllers\Api;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DeviceController extends BaseController
{
    public function index()
    {
        $deviceList = DB::table('devices')->orderBy('id','asc')->get();
        return api_success(['data' => $deviceList],"");
    }

    public function store(Request $request)
    {
        $devices = Device::create($request->all());

        if($devices){
            return api_errors(400,['errors' => 'This device does not exist']);
        } else {
            return api_success(['devices' => $devices]);
        }
        
    }

    public function update(DeviceRequest $request, $id)
    {
        //
        $devices = Device::findOrFail($id);
        $validate = $request->validate([
           
            'name' => 'required',
            'desc' => 'required',
            'status' => 'required',
            'computers_id' => 'required', 
            'type_devices_id' => 'required',
        ]);
        $devices->update($request->all());
        if ($validate->fails()) {
            return api_errors(400, ['errors' => 'This product does not exist, dude!']);
        }
        else {
            return api_success(['devices' => $user]);
        }

    }

    public function destroy($id)
    {
        $devices = Device::find($request->input('id'));
        $devices->delete();
        return "Employee record successfully deleted #" . $request->input('id');
    }
}

