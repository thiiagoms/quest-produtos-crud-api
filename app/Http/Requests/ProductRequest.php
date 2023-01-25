<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'productName'        => ['required', 'min:3'],
            'productPrice'       => ['required'],
            'productDescription' => ['required', 'min:10'],
            'productImage'       => ['required', 'mimes:jpeg,png,svg']
        ];
    }

    public function messages()
    {
        return [
            'productName.required' => "O nome do produto é obrigatório.",
            'productName.min' => "O nome do produto deve possuir no mínimo 03 caracteres.",
            'productPrice.required' => "O preço do produto é obrigatório",
            'productDescription.required' => "A descrição do produto é obrigatória",
            'productDescription.min' => "A descrição do produto deve possuir no mínimo 10 caracteres",
            'productImage.required' => "A imagem do produto é obrigatória",
            'productImage.mimes' => "O arquivo deve estar nas seguintes extensoes pdf,xlx,csv"
        ];
    }
}
