
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
        $userList = DB::table('users')->orderBy('id','ASC')->get();
        return api_success(['data' => $userList],"",200);
    }

    public function store(UserRequest $request)
    {
        // Bug Correcting
        // $validate = $request->validated();
        // if($validate){
        //     return api_errors(400, ['message' => $validator->messages()]);
        // }else{
        //     $validate = User::create($request->all());
        //     return api_success(['user' => $validate]);
        // }
        // 
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return response()->json(['success' => 'Tạo thành công'], 200);
        $user = User::create($request->all());

        if($user){
            return api_errors(400, ['errors' => 'This user does not exist']);
        }else{
            return api_success(['user' => $user]);
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
        return  api_success(['message' => 'ola']);
    }
}