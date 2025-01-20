<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificadoRequest extends FormRequest
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
       // $treinamentoId = $this->route('treinamento');
        return [
            'instrutor' => 'required',
            'empresa' => 'required',
            'funcionario' => 'required',
            'norma' => 'required',
            'descricao' => 'required',
            'data' => 'required',
            'validade' => 'required'
        ];
    }

    public function messages(): array
    {
        return[
            'instrutor.required' => 'Campo instrutor obrigatório',
            'empresa.required' => 'Campo empresa obrigatório',
            'funcinario.required' => 'Campo funcionario obrigatório',
            'nomra.required' => 'Campo norma obrigatório',
            'descricao.required' => 'Campo descrição obrigatório',
            'data.required' => 'Campo data obrigatório',
            'validade.required' => 'Campo validade obrigatório',
        ];
    }
}
