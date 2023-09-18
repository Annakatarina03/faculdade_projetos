<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class EmployeeUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'cpf' => ['required', Rule::unique('employees', 'cpf')->ignore($this->employee)],
            'username' => ['required', Rule::unique('employees', 'username')->ignore($this->employee)],
            'office' => 'required',
            'wage' => 'required',
            'date_entry' => 'required',
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
        ];
    }
}
