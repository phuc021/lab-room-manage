<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:users,username|alpha_num|min:5',
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password|min:5',
            'name' => 'required|max:100',
            'email' => 'required|unique:users,email|max:100'
        ];
    }

    public function messages(){
        return [
             'username.required' => 'Username is unique',
             'username.min' => 'Username must contain at least 5 characters',
             'username.unique' => 'Username is unique',
             'username.alpha_num' => 'The username is only containing characters and numbers',
             'password.required' => 'Password is required',
             'password.min' => 'Mat khau phai hon 5 ky tu',
             'confirm_password .required' => 'Confirm password is required',
             'confirm_password.same' => 'Password verification must be the same as the password',
             'confirm_password .min' => 'Confirm password must contain at least 5 characters',
             'name.required' => 'Name is required',
             'name.max' => 'The maximum name can only contain 100 characters',
             'email.required' => 'Email is required',
             'email.unique' => 'Email is unique',
             'email.max' => 'The maximum email can only contain 100 characters'             
         ];
    }
}
