<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserNuevoRequest extends FormRequest
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
            'name' => 'min:5|max:50|required|string',
            //'foto' => 'required|size:3145728',
            'login' => 'min:5|max:60|required|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'fechainicio' => 'required|date|after:yesterday',
            'fechafin'   => 'required|date|after:fechainicio'
        ];
    }
}