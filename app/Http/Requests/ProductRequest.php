<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if ($this->method()=='POST'){
            return [
                'name'=>'required|max:255',
                'description'=>'required',
                'images'=>'required',
                'count'=>'required',
                'price'=>'required',
                'category_id'=>'required',
                'tag_id'=>'required'
            ];
        }
        return [
            'name'=>'required|max:255',
            'description'=>'required',
            'count'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'tag_id'=>'required'
        ];
    }
}
