<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagsRequest extends FormRequest
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
            'value' => 'required|max:200',
            'devices_id' => 'required'
        ];     
    }

    public function message()
    {
        return [
            'value.required' => 'Giá trị phải tồn tại',
            'value.max' => 'Giá trị không được quá 200 kí tự',
            'devices_id.required' => 'Giá trị phải tồn tại',
        ];
    }
}
