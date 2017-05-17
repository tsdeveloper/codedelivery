<?php

namespace BrindaBrasil\Http\Requests;

use BrindaBrasil\Http\Requests\Request;

class AdminProductRequest extends Request
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
        'name' => 'required|min:3',
        'category_id' => 'required',
        'description' => 'required|min:3',
        'price' => 'required',
        'qtd' => 'required'
       
    ];

    }
}
