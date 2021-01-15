<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlan extends FormRequest
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
        // pega o segmento 3 da url, que no caso mostra o nome do plano
        $url = $this->segment(3);
        // dd($url);

        return [
            // o name precisa ser único, a nao ser que seja no metodo edita, então ele compara com o valor da url
            'name' => "required|min:3|max:255|unique:plans,name,{$url},url",
            'description' => 'nullable|min:3|max:255',
            'price' => "required",
        ];
    }

    public function messages() {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'min'      => 'O campo :attribute precisa ter no mínimo :min caracteres.'
        ];
    }
}
