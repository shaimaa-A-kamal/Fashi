<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
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
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&]).{8,32}$/',
        ];
    }

    public function messages()
    {
        return [
            'password.regex'=>'The :attribute should have: <br>
            1-At least one digit.<br>
            2-At least one lowercase character.<br>
            3-At least one uppercase character.<br>
            4-At least one special character [*.!@#$%^&(){}[]:;<>,.?/~_+-=|\]<br>
            5-At least 8 characters in length, but no more than 32.<br>'
        ];
    }
}
