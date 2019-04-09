<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends BaseController
{

    public function index(){
        $userList = DB::table('users')->orderBy('id','ASC')->get();
        return api_success(['data' => $userList],"",200);
    }

    public function store(UserStoreRequest $request)
    {        
        $user =  User::create($request->all());
        return api_success(['data' => $user],200);    
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->Update($request->all());
        return api_success(['data' => $user],200);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return api_success(['message' => 'Delete User Success'],200);
    }
}