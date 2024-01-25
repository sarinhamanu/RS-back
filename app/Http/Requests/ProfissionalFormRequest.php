<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfissionalFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:120|min:5',
            'celular' => 'required|numeric|max:99999999999|min:1000000000',
            'email'  => 'required|max:120|email|unique:profissionals,email,' . $this->id,
            'cpf' => 'required|numeric|max:99999999999|min:10000000000|unique:profissionals,cpf,' . $this->id,
            'dataNascimento' => 'required|date',
            'cidade' => 'required|max:120',
            'estado' => 'required|alpha|size:2',
            'pais' => 'required|max:80',
            'rua' => 'required|max:120',
            'numero' => 'required|numeric|max:9999999999',
            'bairro' => 'required|max:100',
            'cep' => 'required|numeric|max:99999999|min:10000000',
            'complemento' => 'max:150',
            'password' => 'required',
         
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }


    public function messages()
    {
        return  [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O campo nome não pode ter mais de 120 caracteres.',
            'nome.min' => 'O campo nome deve ter no mínimo 5 caracteres.',
            'celular.required' => 'O campo celular é obrigatório.',
            'celular.numeric' => 'O campo celular deve conter apenas números.',
            'celular.max' => 'O campo celular deve ter no máximo 11 dígitos.',
            'celular.min' => 'O campo celular deve ter no mínimo 10 dígitos.',
            'email.required' => 'O campo email é obrigatório.',
            'email.max' => 'O campo email não pode ter mais de 120 caracteres.',
            'email.email' => 'Por favor, insira um email válido.',
            'email.unique' => 'Este email já está em uso.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.numeric' => 'O campo CPF deve conter apenas números.',
            'cpf.max' => 'O campo CPF deve ter no maximo 11 dígitos.',
            'cpf.min' => 'O campo CPF deve ter no minimo 11 dígitos.',
            'cpf.unique' => 'Este CPF já está em uso.',
            'dataNascimento.required' => 'O campo data de nascimento é obrigatório.',
            'dataNascimento.date' => 'Por favor, insira uma data válida.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'cidade.max' => 'O campo cidade não pode ter mais de 120 caracteres.',
            'estado.required' => 'O campo estado é obrigatório.',
            'estado.alpha' => 'O campo estado deve conter apenas letras.',
            'estado.size' => 'O campo estado deve ter exatamente 2 caracteres.',
            'pais.required' => 'O campo país é obrigatório.',
            'pais.max' => 'O campo país não pode ter mais de 80 caracteres.',
            'rua.required' => 'O campo rua é obrigatório.',
            'rua.max' => 'O campo rua não pode ter mais de 120 caracteres.',
            'numero.required' => 'O campo número é obrigatório.',
            'numero.numeric' => 'O campo número deve conter apenas números.',
            'numero.max' => 'O campo número deve ter no máximo 10 dígitos.',
            'bairro.required' => 'O campo bairro é obrigatório.',
            'bairro.max' => 'O campo bairro não pode ter mais de 100 caracteres.',
            'cep.required' => 'O campo CEP é obrigatório.',
            'cep.numeric' => 'O campo CEP deve conter apenas números.',
            'cep.max' => 'O campo CEP deve ter 8 dígitos.',
            'cep.min' => 'O campo CEP deve ter 8 dígitos.',
            'complemento.max' => 'O campo complemento não pode ter mais de 150 caracteres.',
            'password.required' => 'O campo senha é obrigatório.',

         
        ];
    }
}

