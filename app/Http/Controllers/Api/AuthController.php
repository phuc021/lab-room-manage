<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use Validator;

class AuthController extends Controller
{
	private $apiToken;

	public function __construct(){
		$this->apiToken = uniqid(base64_encode(str_random(60)));
	}    

	public function postLogin(Request $request){
		$rules = [
    		'username' => 'required',
    		'password' => 'required|min:5',
    	];
    	$validator = Validator::make($request->all(),$rules);
    	if ($validator->fails()) {
	      // Validation failed
	    	return response()->json(['message' => $validator->messages(),]);
	    } 
	    else {
	    	// Fetch User
	    	$user = User::where('username',$request->username)->first();
	    	if($user) {
	        	// Verify the password
	        	if( password_verify($request->password, $user->password) ) {
		          	// Update Token
		          	$postArray = ['api_token' => $this->apiToken];
		          	$login = User::where('username',$request->username)->update($postArray);
		          
		          	if($login) {
		            	return response()->json([
		              	'name'         => $user->name,
		              	'username'     => $user->username,
		              	'access_token' => $this->apiToken,
		            	]);
		          	}
		        } 
		        else {
		          return response()->json(['message' => 'Invalid Password',]);
		        }
	      	} 
	      	else {
		        return response()->json(['message' => 'User not found',]);
	      	}
	    }
	}

	public function postRegister(Request $request){
		// Validations
		$rules = [
    		'name' => 'required|max:100',
    		'username' => 'required|unique:users,username|alpha_num',
    		'password' => 'required|min:5',
    		'confirmpassword' => 'required|min:5|same:password',
    		'email' => 'required|unique:users,email|max:100',
    	];
	    $validator = Validator::make($request->all(), $rules);
	    if ($validator->fails()) {
	      // Validation failed
	      return response()->json(['message' => $validator->messages(),]);
	    } 
	    else {
	    	$postArray = [
	    		'name'      => $request->name,
	    		'username'  => $request->username,
	    		'password'  => bcrypt($request->password),
	    		'email'     => $request->email,
	    		'api_token' => $this->apiToken
	    	];
	      // $user = User::GetInsertId($postArray);
	    	$user = User::insert($postArray);
	  
	      	if($user) {
	        	return response()->json([
	          		'name'         => $request->name,
	          		'username'        => $request->username,
	          		'access_token' => $this->apiToken,
	        	]);
	      	} 
	      	else {
	        	return response()->json(['message' => 'Registration failed, please try again.',]);
	      	}
	    }
	}

	public function postLogout(Request $request){

	    $token = $request->header('Authorization');
	    $user = User::where('api_token',$token)->first();
	    if($user) {
	      	$postArray = ['api_token' => null];
	      	$logout = User::where('id',$user->id)->update($postArray);
	      	if($logout) {
	        	return response()->json(['message' => 'User Logged Out',]);
	      	}
	    } 
	    else {
	      return response()->json(['message' => 'User not found',]);
	    }
	}

}
