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
        $deviceList = DB::table('devices')->orderBy('id','DESC')->get();
        return api_success(['data' => $deviceList],200);
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

