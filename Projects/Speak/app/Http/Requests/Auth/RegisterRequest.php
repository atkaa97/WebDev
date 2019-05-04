<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
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
            'name'      => 'required|max:80|string',
            'surname'   => 'required|max:80|string',
            'email'     => 'required|email|string|max:80|unique:users,email',
            'phone'     => 'required|numeric|unique:users,phone',
            'date_of_birth' => 'required|date_format:"M j Y"',
            'gender'    => 'required:in' . User::FEMALE . ',' . User::MALE
        ];
    }

    public function messages()
    {
        return [
            'date_of_birth.date_format' => 'Invalid Date'
        ];
    }
}
