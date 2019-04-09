<?php

namespace App\Http\Controllers\Api;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Http\Requests\DevicesStoreRequest;
use App\Http\Requests\DevicesUpdateRequest;
use App\Models\Device;

class DeviceController extends BaseController
{
    public function index()
    {
        $deviceList = DB::table('devices')->orderBy('id','DESC')->paginate(20);
        return api_success(['data' => $deviceList]);
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

        $deviceList = DB::table('devices')->orderBy('id','ASC')->get();
        return api_success(['data' => $deviceList],"");
    }

    public function store(DevicesStoreRequest $request)
    {
        $devices = Device::create($request->all());

        return api_success(['data' => $devices], 200);
    }

    public function update(DevicesUpdateRequest $request, $id)
    {
        //
        $devices = Device::findOrFail($id);
        $devices->Update($request->all());
       return api_success(['data' => $devices], 200);
    }

    public function destroy($id)
    {

        Device::destroy($id);
        return api_success(['message' => 'Delete Device success'],200);
    }
}

