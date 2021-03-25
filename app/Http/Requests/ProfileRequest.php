<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'fname' => 'required|max:255|string',
            'lname' => 'required|max:255|string',
            'email' => 'required|email',
            'dob' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'fname.required' => 'First Name is required!',
            'lname.required' => 'Last Name is required!',
            'email.required' => 'Email is required!',
            'dob.required' => 'Date is required!',
        ];
    }
}
