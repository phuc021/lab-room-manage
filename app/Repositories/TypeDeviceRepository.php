<?php

namespace App\Repositories;

use App\Models\TypeDevices;
use App\Http\Resources\TypeDeviceResource;

class TypeDeviceRepository
{
	/**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function all(){
        return TypeDeviceResource::collection(TypeDevices::orderBy('id','DESC')->get());
    }

    public function store($request){
    	return new TypeDeviceResource(TypeDevices::create($request->all()));
    }

    public function update($request,$id){
    	$typedevice = TypeDevices::findOrFail($id);
    	$typedevice->update($request->only(['name']));
    	return new TypeDeviceResource($typedevice);
    }

    public function destroy($id){
    	$typedevice = TypeDevices::findOrFail($id);
    	$typedevice->delete();
    	return response()->json(null,204);
    }

    public function show($id){
    	return new TypeDeviceResource(TypeDevices::findOrFail($id));
    }
}
