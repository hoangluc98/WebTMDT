<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestArticle extends FormRequest
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
            'a_name' => 'required|unique:article,a_name',
            'a_content' => 'required',
            'a_description' =>'required'
        ];
    }

    public function messages(){
        return [
            'a_name.required' => 'Trường này không được để trống',
            'a_name.unique' => 'Tên sản phẩm đã tồn tại',
            'a_content.required' => 'Trường này không được để trống',
            'a_description.required' => 'Trường này không được để trống'
        ];
    }
}
