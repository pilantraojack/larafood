<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTenant extends FormRequest
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
            // 'name' => ['required', 'string', 'min:3', 'max:255', 'unique:tenants,name'],
            // 'email' => ['required', 'string', 'email', 'min:3', 'max:255', 'unique:users'],
            // 'cnpj' => ['required', 'string', 'min:14', 'max:18', 'unique:tenants'],
        ];

        if ($this->method() == 'PUT') {
            $rules['image'] = ['nullable'];
        }

        return $rules;
    }

    public function messages() {
        return [
            'required' => __('mdci.Field :attribute is required.'),
            'min'      => __('mdci.Field :attribute must have a minimun of :min characters.')
        ];
    }
}
