<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Faccion;

class UpdateFaccionRequest extends FormRequest
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
        return Faccion::$rules;
    }

    /**
     * Attributes fields
     */
    public function attributes() 
    {
        return Faccion::$attributesCustom;
    }
}
