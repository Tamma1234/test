<?php

namespace App\Http\Requests;

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
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'pemail' => 'Email',
            'ptelephone' => 'Phone Number'
        ];
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'pemail' => 'required|email:rfc,dns|unique:people,pemail',
            'ptelephone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required'=> 'The :attributes field is required',
            'pemail'=> 'The :attributes invalidate',
            'unique'=> 'The :attributes Already exist'
        ];
    }
}
