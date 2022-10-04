<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'firstName' => 'required|min:3|max:20',
            'lastName'  => 'required|min:3|max:20',
            'phone'     => 'required|numeric' ,
            'email'     => 'required|email',
            'fk_role'   => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'min'      => 'O campo :attribute deve ter no mínimo :min caracteres',
            'max'      => 'O campo :attribute deve ter no máximo :max caracteres',
            'numeric'  => 'O campo :attribute deve ser preenchido somente por números',
            'email'    => 'O campo :attribute deve receber um endereço de e-mail válido',
            'integer'  => 'O campo :attribute deve ser preenchido por um número inteiro',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
        'errors' => $validator->errors(),
        'status' => false
        ], 422));
    }
}
