<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Natural;

class CreateNaturalRequest extends FormRequest
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
        return Natural::$rules;
    }
    
    /**
     * Attributes fields
     */
    public function attributes() 
    {
        return Natural::$attributesCustom;
    }
}
