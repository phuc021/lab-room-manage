<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends BaseController
{

    public function index(){
        $userList = DB::table('users')->orderBy('id','DESC')->paginate(10);
        return api_success(['data' => $userList]);
    }

    public function store(Request $request)
    {
        // Bug Correcting
        $user = User::create($request->all());

        if($user){
            return api_errors(400, ['errors' => 'This user does not exist']);
        }else{
            return api_success(['user' => $newUser]);
        }
    }

    public function update(UserRequest $request, $id)
    {

        $user = User::findOrFail($id);
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'name' => 'required',
            'email' => 'required', 
            'role' => 'required',
        ]);
        $user->Update($request->all());

        if ($validate->fails()) {
            return api_errors(400, ['errors' => 'This product does not exist, dude!']);
        }
        else {
            return api_success(['user' => $user]);
        }
        
    }

    public function destroy($id)
    {
        User::destroy($id);
        return api_success(['message' => 'ola']);
    }
}