<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComputerRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Room;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemperPage=12;
        $computerList = DB::table('computers')->paginate($itemperPage);
        // $computerList = DB::table('computers')->orderby('id','DESC')->get();
        return view('computers.index',['computerList' => $computerList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomList = Room::all();
        return view('computers.create',
                array("roomList" => $roomList));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComputerRequest $request)
    {
        Computer::create($request->all());
        return redirect('computers');
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
        $roomList = Room::all();
        $computer = Computer::where('id', $id)->first();
        return view('computers.edit',array("roomList" => $roomList),['computers' => $computer]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComputerRequest $request, $id)
    {
        $computer = Computer::findOrFail($id);
        $computer->update($request->all());
        return redirect('computers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Computer::destroy($id);
        return redirect('computers');
    }
}
