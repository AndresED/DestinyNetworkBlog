<?php

namespace DestinyH\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array
     */
    public function messages()
    {
        return [
            'password.regex' => 'Password isn\'t secure enough!',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_login' => 'required|string|min:6|max:20|unique:users',
            'user_email' => 'required|email|unique:users',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|',
            'user_gender' => ['required', Rule::in(['masculino', 'femenino'])],
            'g-recaptcha-response' => 'required|recaptcha',
        ];
    }

}
