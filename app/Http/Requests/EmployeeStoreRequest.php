<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
     *  @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'cpf' => 'required|unique:employees,cpf',
            'username' => 'required|unique:employees,username',
            'office' => 'required',
            'wage' => 'required',
            'date_entry' => 'required',
            'password' => 'required|min:8|same:password_confirmation',
            'password_confirmation' => 'required|same:password'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo obrigatório',
            'cpf.required' => 'Campo obrigatório',
            'cpf.unique' => 'CPF já em uso',
            'username.required' => 'Campo obrigatório',
            'username.unique' => 'Nome de usuário já em uso',
            'office.required' => 'Campo obrigatório',
            'wage.required' => 'Campo obrigatório',
            'date_entry.required' => 'Campo obrigatório',
            'password.required' => 'Campo obrigatório',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres',
            'password.same' => 'Senhas devem ser iguais',
            'password_confirmation.required' => 'Campo obrigatório',
            'password_confirmation.same' => 'Senhas devem ser iguais'
        ];
    }
}
