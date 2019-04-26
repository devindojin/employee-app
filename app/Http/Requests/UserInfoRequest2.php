<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest2 extends FormRequest
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
            'lph_From_mo' => 'required|gt:00',
            'lph_From_yr' => 'required|gt:1970',
            'lph_To_mo' => 'nullable|gt:00',
            'lph_To_yr' => 'nullable|gt:1970'
        ];
    }

    public function messages()
    {
        return [
            'lph_From_mo.required' => 'The Période de month is required',
            'lph_From_yr.required' => 'The Période de year is required',
            'lph_From_mo.gt' => 'The Période de month must be greater than 00',
            'lph_From_yr.gt' => 'The Période de year must be greater than 1970',
            'lph_To_mo.gt' => 'The Période to month must be greater than 00',
            'lph_To_yr.gt' => 'The Période to year must be greater than 1970'
        ];
    }
}
