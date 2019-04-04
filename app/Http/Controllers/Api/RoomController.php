<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RoomRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;

class RoomController extends BaseController
{
    public function index( )
    {
        $roomsList = DB::table('rooms')->orderby('id','ASC')->get();
        return api_success(['data' => $roomsList],"");    
    }

     public function store(Request $request)
    {
        $rooms = Room::create($request->all());

        if ($rooms) {
        	return api_errors(400, ['errors' =>'this room does not exitst']);
        }else{
        	return api_success(['room' => $rooms]);
        }
    }
    public function update(RoomRequest $request, $id)
    {
        $rooms = Room::findOrFail($id);
        $validate = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'status' => 'required',
            'created_at' => 'required', 
            'updated_at' => 'required',
        ]);
        $rooms->Update($request->all());

        if ($validate->fails()) {
        	return api_errors(400,['errors' => 'this product does not exits, dudel']);
        }
        else {
        	return api_success(['rooms' => $rooms]);
        }
    }
    public function destroy($id)
    {
        Room::destroy($id);
        return api_success(['message' => 'ola']);
    }

}
