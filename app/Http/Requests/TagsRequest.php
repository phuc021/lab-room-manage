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
            'value' => 'required|min:1|max:50',
        ];     
    }

    public function messages()
    {
        return [
            'value.required' => trans('tags/langTag.request_required'),
            'value.max' => trans('tags/langTag.request_max'),
        ];
    }
}
