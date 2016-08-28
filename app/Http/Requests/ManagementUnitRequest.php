<?php

namespace SisConPat\Http\Requests;

use SisConPat\Http\Requests\Request;

class ManagementUnitRequest extends Request
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
            'code'                      => 'max:15|required|unique:management_units,code,'.$this->id.',id,deleted_at,NULL',
            'region_id'                 => 'required',
            'description'               => 'max:100|required',
            'email'                     => 'max:100|email|unique:management_units,email,'.$this->id.',id,deleted_at,NULL',
            'address'                   => 'required',
            'neighborhood'              => 'required',
            'city_id'                   => 'required',
            'zip_code'                  => 'required|digits:8',
            'phone'                     => 'telefone',
            'mobile'                    => 'celular'
            //
        ];
    }

    public function messages()
    {
        return [
            'code.max'                  => '<b>Código</b> >> MÁXIMO 15 caracteres.',
            'code.required'             => '<b>Código</b> >> Preenchimento obrigatório.',
            'code.unique'               => '<b>Código</b> >> Indisponível.',
            'region.required'           => '<b>Unid.Gestora</b> >> Preenchimento obrigatório.',
            'description.max'           => '<b>Descrição</b> >> MÁXIMO 100 caracteres.',
            'description.required'      => '<b>Descrição</b> >> Preenchimento obrigatório.',
            'address.required'          => '<b>Endereço</b> >> Preenchimento obrigatório.',
            'neighborhood.required'     => '<b>Bairro</b> >> Preenchimento obrigatório.',
            'city_id.required'          => '<b>Cidade</b> >> Preenchimento obrigatório.',
            'zip_code.required'         => '<b>CEP</b> >> Preenchimento obrigatório.',
            'zip_code.digits'           => '<b>CEP</b> >> Inválido (8 dígitos).',
            'phone.telefone'            => '<b>Telefone</b> >> Inválido.',
            'mobile.celular'            => '<b>Celular</b> >> Inválido.'
        ];
    }
}
