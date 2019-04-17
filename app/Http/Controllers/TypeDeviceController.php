<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TypeDevice;
use App\Http\Requests\TypeDeviceRequest;



class TypeDevice extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemPerPage = 20;
        $typeDevice = TypeDevice::paginate($itemPerPage);
        return view('typeDevice.index',['typeDevice'=>$typeDevice]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeDevice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeDeviceRequest $request)
    {
        TypeDevice::create($request->all());
        return redirect('typeDevice');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
TypeDevice     */
    public function show($id)
    {
        $typeDevice = TypeDevice::findOrFail($id);
        // $TypeDevice = DB::table('TypeDevice')->where('id',$id)->first();
        return view('typeDevice.show', ['typeDevice', $typeDevice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeDevice = TypeDevice::where('id', $id)->first();
        return view('typeDevice.edit',['typeDevice'=>$typedevices]);
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
