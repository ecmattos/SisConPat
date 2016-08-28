<?php

namespace SisConPat\Http\Requests;

use SisConPat\Http\Requests\Request;

class PatrimonialPurchaseSearchRequest extends Request
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
            'srch_management_unit_id'  => 'required',
            'srch_purchase_date_start' => 'required|date_format:d/m/Y',
            'srch_purchase_date_end'   => 'required|date_format:d/m/Y'
            //
        ];
    }

    public function messages()
    {
        return [
            'srch_management_unit_id.required'     => '<b>Unid.Gestora</b> >> Preenchimento obrigatório.',
            'srch_purchase_date_start.required'    => '<b>Competência início</b> >> Preenchimento obrigatório.',
            'srch_purchase_date_start.date_format' => '<b>Competência início</b> >> Inválida.',
            'srch_purchase_date_end.required'      => '<b>Competência fim</b> >> Preenchimento obrigatório.',
            'srch_purchase_date_end.date_format'   => '<b>Competência fim</b> >> Inválida.'
            
        ];
    }
}