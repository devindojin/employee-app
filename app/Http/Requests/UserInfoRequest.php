<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
            'civility'      => 'max:20',
            'last_name'     => 'max:50',
            'first_name'    => 'max:50',
            'code_postal'   => 'max:10',
            'city'          => 'max:25',
            'telephone'     => 'max:12',
            'annual_salary' => 'nullable|numeric'
        ];
    }
}
