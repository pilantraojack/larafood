<?php

namespace App\Http\Requests;

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
            'title' => ['required', 'min:3', 'max:255', "unique:products,title,{$id},id"],
            'description' => ['required', 'min:3', 'max:500'],
            'image' => ['required'],
            'price' => "required",
        ];

        if ($this->method() == 'PUT') {
            $rules['image'] = ['nullable'];
        }

        return $rules;
    }

    public function messages() {
        return [
            'required' => 'Campo :attribute é obrigatório.',
            'min'      => 'Campo :attribute precisa ter no mínimo :min caracteres.'
        ];
    }
}
