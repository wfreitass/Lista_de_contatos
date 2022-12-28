<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name' => ['required', 'min:5'],
            'email' => ['required',  'email:rfc,dns'],
            'contact' => ['required', 'min:8', 'max:90'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo Obrigatório',
            'name.min' => 'O campo precisa de no mínimo :min caracters',
            'email.required' => 'Campo Obrigatório',
            'email.email' => 'Informe um email válido',
            'contact.required' => 'Campo Obrigatório',
            'contact.min' => 'O campo precisa de no mínimo :min caracters',
            'contact.max' => 'O campo precisa de no mínimo :max caracters',
        ];
    }
}
