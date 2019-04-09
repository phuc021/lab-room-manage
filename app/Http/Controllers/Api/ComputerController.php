<?php

namespace App\Http\Controllers\Api;

use App\Models\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ComputerRequest;
use App\Http\Requests\ComputerStoreRequest;
use App\Http\Requests\ComputerUpdateRequest;

class ComputerController extends BaseController
{
    public function index()
    {
        
         $computerList = DB::table('computers')->orderby('id','ASC')->get();
        return api_success(['data' => $computerList],"");
    }
    public function store(ComputerStoreRequest $request)
    {
        $computer = Computer::create($request->all());
        return api_success(['data' => $computer],200);
    }
    public function update(ComputerUpdateRequest $request, $id)
    {
        $computer = Computer::findOrFail($id);
        $computer->Update($request->all());
        return api_success(['data' => $computer],200);

    }
    public function destroy($id)
    {
        Computer::destroy($id);
        return api_success(['message' => 'delete computer complete'],200);
    }

}
