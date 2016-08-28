<?php

namespace SisConPat\Http\Requests;

use SisConPat\Http\Requests\Request;

class PatrimonialMovementRequest extends Request
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
            'management_unit_id'     => 'required',
            'patrimonial_sector_id'     => 'required',
            'patrimonial_sub_sector_id' => 'required',
            'patrimonial_status_id'     => 'required',
            'patrimonial_status_date'   => 'required|date_format:d/m/Y'
            //
        ];
    }

    public function messages()
    {
        return [
            'management_unit_id.required'        => '<b>Unid.Gestora</b> >> Preenchimento obrigatório.',
            'patrimonial_sector_id.required'        => '<b>Setor</b> >> Preenchimento obrigatório.',
            'patrimonial_sub_sector_id.required'    => '<b>Sub-setor</b> >> Preenchimento obrigatório.',
            'patrimonial_status_id.required'        => '<b>Situação</b> >> Preenchimento obrigatório.',
            'patrimonial_status_date.required'      => '<b>Data Situação</b> >> Preenchimento obrigatório.',
            'patrimonial_status_date.after'         => '<b>Data Nota Fiscal</b> >> Posterior a data de situação.',
            'patrimonial_status_date.date_format'   => '<b>Data Situação</b> >> Inválida.'
        ];
    }
}
