<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

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
            'name'=>"required|max:255|string|alpha_dash|unique:users",
            'email'=>"required|unique:users|email",
            'phone'=>"unique:users|nullable|numeric",
            'gender' =>'required |string|max:1',
            'password'=>'required|confirmed|string|regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&]).{8,32}$/',
            'image'=>'nullable|image|mimes:jpeg,jpg,png,gif'
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
