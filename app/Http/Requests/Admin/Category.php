<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Category extends FormRequest
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
        $rules = [
            'sort' => 'required|numeric|between:0,255', // TODO: 只能是整数
        ];
        if ('PUT' == $this->method()) {
            $rules['name'] = 'required|unique:categories,id,:id|max:255';
        } else {
            $rules['name'] = 'required|unique:categories|max:255';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => '名称是必填的',
            'sort.required' => '排序是必填的',
            'sort.between' => '排序必须是:min和:max之间的正整数',
        ];
    }
}
