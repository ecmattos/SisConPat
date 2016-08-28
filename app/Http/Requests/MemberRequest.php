<?php

namespace SisConPat\Http\Requests;

use SisConPat\Http\Requests\Request;

class MemberRequest extends Request
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
        $member_status_id = Request::get('member_status_id');

        if ($member_status_id == "")
        {
            $validationMemberStatusReason = '';
        }
        elseif ($member_status_id == "1")
        {
            $validationMemberStatusReason = 'required|in:2,3,4,5,6,7,8,9';
        }
        elseif ($member_status_id == "2")
        {
            $validationMemberStatusReason = 'required|in:1';
        }

        return [
            'code'                      => 'required|unique:members,code,'.$this->id.',id,deleted_at,NULL',
            'cpf'                       => 'cpf_mascara|unique:members,cpf,'.$this->id.',id,deleted_at,NULL',
            'name'                      => 'max:100|required',
            'plan_id'                   => 'required',
            'member_status_id'          => 'required',
            'gender_id'                 => 'required',
            'email'                     => 'max:100|email|unique:members,email,'.$this->id.'',
            'address'                   => 'required',
            'neighborhood'              => 'required',
            'city_id'                   => 'required',
            'zip_code'                  => 'required|digits:8',
            'phone'                     => 'telefone',
            'mobile'                    => 'celular',
            'date_aafc_ini'             => 'required|date_format:d/m/Y',
            'date_aafc_fim'             => 'required_if:member_status_id,1|after:date_aafc_ini|date_format:d/m/Y',
            'member_status_reason_id'   => $validationMemberStatusReason,
            'birthday'                  => 'date_format:d/m/Y'
            //
        ];
    }

    public function messages()
    {
        return [
            'code.required'                     => '<b>Matrícula</b> >> Preenchimento obrigatório.',
            'code.unique'                       => '<b>Matrícula</b> >> Indisponível.',
            'cpf.cpf_mascara'                   => '<b>CPF</b> >> Inválido.',
            'cpf.unique'                        => '<b>CPF</b> >> Indisponível.',
            'name.required'                     => '<b>Nome</b> >> Preenchimento obrigatório.',
            'plan_id.required'                  => '<b>Plano</b> >> Preenchimento obrigatório.',
            'member_status_id.required'         => '<b>Situação</b> >> Preenchimento obrigatório.',
            'gender_id.required'                => '<b>Sexo</b> >> Preenchimento obrigatório.',
            'address.required'                  => '<b>Endereço</b> >> Preenchimento obrigatório.',
            'neighborhood.required'             => '<b>Bairro</b> >> Preenchimento obrigatório.',
            'city_id.required'                  => '<b>Cidade</b> >> Preenchimento obrigatório.',
            'zip_code.required'                 => '<b>CEP</b> >> Preenchimento obrigatório.',
            'zip_code.digits'                   => '<b>CEP</b> >> Inválido (8 dígitos).',
            'phone.telefone'                    => '<b>Telefone</b> >> Inválido.',
            'mobile.celular'                    => '<b>Celular</b> >> Inválido.',
            'birthday.date_format'              => '<b>Data de Nascimento</b> >> Inválida.',
            'date_aafc_ini.required'            => '<b>Data de Patrimônio</b> >> Preenchimento obrigatório.',
            'date_aafc_ini.date_format'         => '<b>Data de Patrimônio</b> >> Inválida.',
            'date_aafc_fim.required_if'         => '<b>Data Desligamento</b> >> Preenchimento obrigatório.',
            'date_aafc_fim.date_format'         => '<b>Data Desligamento</b> >> Inválida.',
            'member_status_reason_id.required'  => '<b>Motivo Desligamento</b> >> Preenchimento obrigatório.',
            'member_status_reason_id.in'        => '<b>Motivo Desligamento</b> >> Inválido.',
            'date_aafc_fim.after'               => '<b>Data de Patrimônio</b> >> Posterior a data de desligamento.'
        ];
    }
}
