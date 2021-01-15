<?php

namespace App\Http\Requests;

use App\Tenant\Rules\UniqueTenant;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
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
        $id = $this->segment(3);

        return [
            'title' => [
                'required',
                'min:3',
                'max:255',
                new UniqueTenant('products', $id),
            ],
            'description' => ['required', 'min:3', 'max:1000'],
        ];

        if ($this->method() == 'PUT') {
            $rules['image'] = ['nullable', 'image'];
        }
    }

    public function messages() {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'min'      => 'O campo :attribute precisa ter no mínimo :min caracteres.'
        ];
    }
}
