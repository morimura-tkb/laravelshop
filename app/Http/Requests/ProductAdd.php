<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAdd extends FormRequest
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
            'name'=>'required|max:200',
            'price'=>'required|min:1|alpha_num',
            'stock'=>'required|min:0|alpha_num',
            'limited'=>'required|min:0|max:200|alpha_num',
            'ref1'=>'required|min:0|max:4|alpha_num',
            'ref2'=>'required|min:0|max:4|alpha_num',
        ];
    }
}
