<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditRequest extends FormRequest
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
            'name'=>["required" ,"max:255","string",'alpha_dash',Rule::unique('users','name')->ignore(auth()->user())],
            'email'=>["required","email",Rule::unique('users','email')->ignore(auth()->user())],
            'phone'=>["nullable","numeric",Rule::unique('users','phone')->ignore(auth()->user())],
            'gender' =>'required |string|max:1',
            'image'=>'nullable|image|mimes:jpeg,jpg,png,gif',
        ];
    }

}
