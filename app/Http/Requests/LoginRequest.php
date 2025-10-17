<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator as ExceptionValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    // ->mixedCase()
                    // ->numbers()
                    // ->symbols()
            ]
        ];
    }

    public function messages()
    {
        return [
            "user_id.required" => "Nama sudah digunakan (harus unik)",
        ];
    }

    protected function failedValidation(ExceptionValidator $validator)
    {
        throw new HttpResponseException(Redirect::route('login')->withInput()->withErrors(['err' => $validator->errors()]));
        // return Redirect::route('login')->withErrors(['err' => $validator->errors()]);
    }
}