<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateProfileRequest extends Request
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
    public function messages() {
        return [
            'name.required' => 'Vards ir jāievada obligāti!',
            'name.min' => 'Vārdam jābūt vismaz 3 simbolus garam!',
            'lastname' => 'Uzvārdam jābūt vismaz 3 simbolus garam!',
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'lastname' => 'min:3',
        ];
    }
}
