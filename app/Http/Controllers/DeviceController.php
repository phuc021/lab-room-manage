<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Device;
use App\Models\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DeviceRequest;


class DeviceController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemPerPage = 20;
        $devicesList = Device::paginate($itemPerPage);
        // $devicesList = DB::table('devices')->orderBy('id','DESC')->get();
        return view('devices.index',['devicesList'=> $devicesList]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomList = Room::all();
        $computerList = Computer::all();
        return view('devices.create', 
            array("computerList" => $computerList,
                  "roomList" => $roomList));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceRequest $request)
    {
        Device::create($request->all());
        return redirect('devices');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $devices = Device::where('id', $id)->first();
        return view('devices.edit',['devices'=>$devices]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeviceRequest $request, $id)
    {
        //
        $devices = Device::findOrFail($id);
        $devices->update($request->all());
        return redirect('devices');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Device::destroy($id);
        return redirect('devices');
    }
}
