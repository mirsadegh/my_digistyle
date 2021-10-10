<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() == true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

         return [
              "name"        => "required",
              "lastname"    => "required",
              "email"       => "required|email|unique:users,email,".auth()->id(),
              "phone"       => ['required' , 'regex:/^(?:98|\+98|0098|0)?9[0-9]{9}$/','unique:users'],
              "gender"      =>  ["required",Rule::in(['male','female'])],
              "address"     => "required",
              "nationalCode"    => "required|numeric|unique:users,nationalCode",
              "province_id" => "required",
              "city_id"     => "required",
              "password"    => ['required', 'string', 'min:8','confirmed'] ,
             
        ];
    }
}
