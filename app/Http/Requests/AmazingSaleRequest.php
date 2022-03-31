<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmazingSaleRequest extends FormRequest
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
            'product_id'     => 'required|exists:products,id|unique:amazing_sales,product_id',
            'percentage'     => 'required|numeric|between:0,100',
            'start_date'     => 'required',
            'end_date'       => 'required',
        ];

    }
}
