<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
              "name"         => "required",
              "lastname"     => "required",
              "email"        => "required|email|unique:users",
              "phone"        => ['required' , 'regex:/^(?:98|\+98|0098|0)?9[0-9]{9}$/','unique:users'],
              "gender"       =>  ['required',Rule::in(['male','female'])],
              "address"      => "required|string|min:10",
              "nationalCode" => "required|numeric|unique:users,nationalCode",
              "province_id"  => "required",
              "city_id"      => "required",
              "password"     => ['required', 'string', 'min:8','confirmed'] ,
              "agree"        => "accepted"
        ];

    }
}
