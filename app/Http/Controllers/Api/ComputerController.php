<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ComputerController extends BaseController
{
    public function index()
    {
        
         $computerList = DB::table('computers')->orderby('id','DESC')->paginate(20);
        return api_success(['data' => $computerList]);
    }
    public function store(ComputerRequest $request)
    {
        Computer::create($request->all());
         if($computer){
            return api_errors(400, ['errors' => 'This computer does not exist']);
        }else{
            return api_success(['computers' => $newComputer]);
        }
    }
    public function update(ComputerRequest $request, $id)
    {
        $computer = Computer::findOrFail($id);
        $computer->update($request->all());
        if ($validate->fails()) {
            return api_errors(400, ['errors' => 'This product does not exist, dude!']);
        }
        else {
            return api_success(['computers' => $computer]);
        }    }
    public function destroy($id)
    {
        Computer::destroy($id);
        return api_success(['message' => 'ola']);
    }

}
