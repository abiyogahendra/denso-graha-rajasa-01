<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class DataTableReferenceDTO extends FormRequest
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
            'search' => 'required',
            'sort' => 'required',
            'order' => 'required',
            'offset' => 'required',
            'limit' => 'required',

        ];
    }
}
