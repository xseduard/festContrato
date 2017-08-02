<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UpdateUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombres'   => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'cedula'    => 'required|numeric',
            'email'     => 'required|string|email|max:255|unique:users,email,'.$this->route('usuario'),
            'password'  => 'required|string|min:6|confirmed',
        ];
    }
}
