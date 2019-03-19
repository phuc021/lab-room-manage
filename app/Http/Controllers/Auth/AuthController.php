<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function getRegister(){
    	return view('auth.register');
    }

    public function postRegister(Request $req){
    	$rules = [
    		'name' => 'required|max:100',
    		'username' => 'required|unique:users,username|alpha_num',
    		'password' => 'required|min:5',
    		'confirmpassword' => 'required|min:5|same:password',
    		'email' => 'required|unique:users,email|max:100',
    	];

    	$validate = Validator::make($req->all(),$rules);
    	if ($validate->fails()) {
    		return redirect()->back()->withInput()->withErrors($validate);
    	}

    	$newUser = new User;
    	$newUser->name = $req['name'];
    	$newUser->username = $req['username'];
    	$newUser->password = bcrypt($req['password']);
    	$newUser->email = $req['email'];
    	
    	$newUser->save();
    	return redirect('login')->with(['success' => 'Tạo tài khoản thành công !!!']);
    }

    public function getLogin(){
    	return view('auth.login');
    }

    public function postLogin(Request $req){
    	$rules = [
    		'username' => 'required',
    		'password' => 'required',
    	];

    	$validate = Validator::make($req->all(),$rules);
    	if ($validate->fails()) {
    		return redirect()->back()->withInput()->withErrors($validate);
    	}
    	else {
    		if (Auth::attempt(['username' => $req['username'], 'password' => $req['password']],true)) {
    			return redirect('/')->with(['hello' => 'Helloooo']);
    		}
    		else{
    			return redirect()->back()->withInput();
    		}
    	}
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect('/');
    }
}
