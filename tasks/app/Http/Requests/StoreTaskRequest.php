<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreTaskRequest extends Request
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
            'name.required' => 'Uzdevuma nosaukums ir obligāts!',
            'name.min' => 'Uzdevuma nosaukumam jābūt vismaz 3 simbolus garam!',
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3',
        ];
    }
}
