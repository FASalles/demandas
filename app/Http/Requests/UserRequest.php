<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
    return [
        'name' => 'required|min:6',
        'email' => 'required',
        'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        Return [
            'name.required' => 'O campo :attribute é obrigatório',
            'email.required' => 'O campo :attribute é obrigatório',
            'password.required' => 'O campo :attribute é obrigatório',
            'password.min' => 'A senha deve possuir oito caracteres'
        ];
    }
}
