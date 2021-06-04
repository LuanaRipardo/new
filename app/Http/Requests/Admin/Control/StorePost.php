<?php

namespace App\Http\Requests\Admin\Control;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'título',
            'content' => 'conteúdo',
            'path' => 'imagem',
            'category_id' => 'categoria',
            'user_id' => 'usuário'
        ];
    }
}
