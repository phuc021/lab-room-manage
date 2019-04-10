<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TypeDevices;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeDeviceStoreRequest;
use App\Http\Requests\TypeDeviceUpdateRequest;
use Validator;

class TypeDeviceController extends Controller
{
    public function index(){
        $typedeviceList = DB::table('type_devices')->orderBy('id','ASC')->get();
        return api_success(['data' => $typedeviceList],"",200);
    }

    public function store(TypeDeviceStoreRequest $request)
    {
        $typedevice = TypeDevices::create($request->all());
        return api_success(['data' => $typedevice],200);
    }
    public function update(TypeDeviceStoreRequest $request, $id)
    {
        $typedevice = TypeDevices::findOrFail($id);
        $typedevice->Update($request->all());
        return api_success(['data' => $typedevice],200);

    }
    public function destroy($id)
    {
        TypeDevices::destroy($id);	
        return api_success(['message' => 'delete typedevice complete'],200);
    }
}
