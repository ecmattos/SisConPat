<?php

namespace SisConPat\Http\Requests;

use SisConPat\Http\Requests\Request;

class PatrimonialTypeRequest extends Request
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
        $depreciation_accounting_account_id     = Request::get('depreciation_accounting_account_id');

        #dd($depreciation_accounting_account_id);

        if($depreciation_accounting_account_id=='1')
        {
            $validationUsefulLifeYears    = 'required|in:0';
        }
        else
        {
            $validationUsefulLifeYears    = 'required|integer|between:1,50';
        }

        return [
            'code' => 'max:5|required|unique:patrimonial_types,code,'.$this->id.',id,deleted_at,NULL',
            'description' => 'max:20|required|unique:patrimonial_types,description,'.$this->id.',id,deleted_at,NULL',
            'asset_accounting_account_id'       => 'required',
            'depreciation_accounting_account_id' => 'different:asset_accounting_account_id',
            'useful_life_years'                 => $validationUsefulLifeYears
            //
        ];
    }

    public function messages()
    {
        return [
            'code.max' => '<b>Código</b> >> MÁXIMO 5 caracteres.',
            'code.required' => '<b>Código</b> >> Preenchimento obrigatório.',
            'code.unique' => '<b>Código</b> >> Indisponível.',
           
            'description.max' => '<b>Descrição</b> >> MÁXIMO 20 caracteres.',
            'description.required' => '<b>Descrição</b> >> Preenchimento obrigatório.',
            'description.unique' => '<b>Descrição</b> >> Indisponível.',

            'asset_accounting_account_id.required'          => '<b>Conta Contábil Ativo</b> >> Preenchimento obrigatório.',
            'depreciation_accounting_account_id.different'  => '<b>Conta Contábil Depreciação</b> >> Igual a Conta Contábil Ativo.',
            
            'useful_life_years.required'                    => '<b>Vida útil</b> >> Preenchimento obrigatório.',
            'useful_life_years.in'                          => '<b>Vida útil</b> >> Inválida.',
            'useful_life_years.between'                     => '<b>Vida útil</b> >> Inválida (máximo de 50 anos).'
        ];
    }
}
