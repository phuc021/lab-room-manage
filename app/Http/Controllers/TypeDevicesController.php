<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TypeDevices;
use App\Http\Requests\TypeDeviceRequest;



class TypeDevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typedevicesList = DB::table('type_devices')->orderBy('id','DESC')->get(); 
        return view('typedevices.index',['typedevicesList'=>$typedevicesList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typedevices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeDeviceRequest $request)
    {
        TypeDevices::create($request->all());
        return redirect('typedevices');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typedevices = typedevices::findOrFail($id);
        // $typedevices = DB::table('typedevicess')->where('id',$id)->first();
        return view('typedevices.show', ['typedevices', $typedevices]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typedevices = TypeDevices::where('id', $id)->first();
        return view('typedevices.edit',['typedevices'=>$typedevices]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeDeviceRequest $request, $id)
    {
        $typedevices = typedevices::findOrFail($id);
        $typedevices->Update($request->all());
        // dd($typedevices);
        return redirect('typedevices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TypeDevices::destroy($id);
        return redirect('/typedevices');
    }

}
