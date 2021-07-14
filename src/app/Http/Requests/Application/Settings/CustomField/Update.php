<?php

namespace App\Http\Requests\Application\Settings\CustomField;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'name' => 'required|string|max:190',
            'label' => 'required|string|max:190',
            'model_type' => 'required|string|max:190',
            'order' => 'required|integer',
            'type' => 'required|string|max:190',
            'is_required' => 'nullable|boolean',
            'options' => 'nullable|array',
            'placeholder' => 'nullable|string',
        ];
    }
}