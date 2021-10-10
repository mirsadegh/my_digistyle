<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
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

        $rules =  [
              "name"        => "required",
              "lastname"    => "required",
              "email"       => "required|email|unique:users,email,".request('user'),
              "phone"       => ['required','regex:/^(?:98|\+98|0098|0)?9[0-9]{9}$/','unique:users,phone,'.request('user')],
              "gender"      => [ Rule::in(['male','female'])],
              "address"     => "required",
              "nationalCode"    => "required|numeric|unique:users,nationalCode,".request('user'),
              "province_id" => "nullable",
              "city_id"     => "nullable",

        ];



        if((request('password'))){

             $rules['password'] = [ 'string', 'min:8','confirmed'];
        }

        return $rules;

    }
}
