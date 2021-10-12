<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            'flat'=>'nullable||numeric',
            'floor'=>'nullable|max:255|string|alpha_num',
            'street'=>'required|max:255|string|alpha',
            'building'=>'required|max:255|string|alpha_num',
            'city_id'=>'required|numeric',
            'region_id'=>'required|numeric',
        ];
    }

    public function messages(){
      return [
        'city_id.required' => 'The city field is required',
        'region_id.required' => 'The region field is required',
       ];
    }
}
