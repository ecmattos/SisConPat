<?php

namespace SisConPat\Http\Requests;

use SisConPat\Http\Requests\Request;

class PatrimonialRequest extends Request
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
        $invoice_date               = Request::get('invoice_date');
        $depreciation_date_start    = Request::get('depreciation_date_start');
        $patrimonial_status_date    = Request::get('patrimonial_status_date');

        if ($invoice_date!=$patrimonial_status_date) 
        {
            $validationInvoiceDate              = 'required|before:patrimonial_status_date|date_format:d/m/Y';
            $validationPatrimonialStatusDate    = 'required|after:invoice_date|date_format:d/m/Y';
        }
        else
        {
            $validationInvoiceDate              = 'required|date_format:d/m/Y';
            $validationPatrimonialStatusDate    = 'required|date_format:d/m/Y';
        }


        if ($invoice_date!=$depreciation_date_start) 
        {
            $validationDepreciationDateStart = 'required|after:invoice_date|date_format:d/m/Y';
        }
        else
        {
            $validationDepreciationDateStart = 'required|date_format:d/m/Y';
        }

        return [
            'code'                      => 'required|unique:patrimonials,code,'.$this->id.',id,deleted_at,NULL',
            'description'               => 'required',
            'patrimonial_type_id'       => 'required',
            'patrimonial_sub_type_id'   => 'required',
            'patrimonial_brand_id'      => 'required',
            'patrimonial_model_id'      => 'required',
            'serial'                    => 'required',
            'purchase_process'          => 'required',
            'provider_id'               => 'required',
            'invoice_date'              => $validationInvoiceDate,
            'purchase_value'            => 'required|min:1',
            'invoice'                   => 'required',
            'depreciation_date_start'   => $validationDepreciationDateStart,
            'management_unit_id'        => 'required',
            'patrimonial_sector_id'     => 'required',
            'patrimonial_sub_sector_id' => 'required',
            'patrimonial_status_id'     => 'required',
            'patrimonial_status_date'   => $validationPatrimonialStatusDate
            //
        ];
    }

    public function messages()
    {
        return [
            'code.required'                         => '<b>Código</b> >> Preenchimento obrigatório.',
            'code.unique'                           => '<b>Código</b> >> Indisponível.',

            'description.required'                  => '<b>Descrição</b> >> Preenchimento obrigatório.',

            'patrimonial_type_id.required'          => '<b>Tipo</b> >> Preenchimento obrigatório.',
            'patrimonial_sub_type_id.required'      => '<b>Sub-tipo</b> >> Preenchimento obrigatório.',
            'patrimonial_brand_id.required'         => '<b>Marca</b> >> Preenchimento obrigatório.',
            'patrimonial_model_id.required'         => '<b>Modelo</b> >> Preenchimento obrigatório.',

            'serial.required'                       => '<b>Nr serial</b> >> Preenchimento obrigatório.',
            'purchase_process.required'             => '<b>Processo Compra</b> >> Preenchimento obrigatório.',
            'provider_id.required'                  => '<b>Fornecedor</b> >> Preenchimento obrigatório.',
            'invoice_date.required'                 => '<b>Data Nota Fiscal</b> >> Preenchimento obrigatório.',
            'invoice_date.before'                   => '<b>Data Nota Fiscal</b> >> Posterior a Data Situação.',
            'invoice_date.date_format'              => '<b>Data Nota Fiscal</b> >> Inválida.',
            'purchase_value.required'               => '<b>Valor Compra</b> >> Preenchimento obrigatório.',
            'purchase_value.min'                    => '<b>Valor Compra</b> >> Inválido.',

            'invoice.required'                      => '<b>Nota fiscal</b> >> Preenchimento obrigatório.',
            
            'depreciation_date_start.required'      => '<b>Data início depreciação</b> >> Preenchimento obrigatório.',
            'depreciation_date_start.date_format'   => '<b>Data início depreciação</b> >> Inválida.',
            'depreciation_date_start.after'         => '<b>Data início depreciação</b> >> Anterior a Data de Compra.',
           
            'management_unit_id.required'           => '<b>Unid.Gestora</b> >> Preenchimento obrigatório.',
            'patrimonial_sector_id.required'        => '<b>Setor</b> >> Preenchimento obrigatório.',
            'patrimonial_sub_sector_id.required'    => '<b>Sub-setor</b> >> Preenchimento obrigatório.',
            'patrimonial_status_id.required'        => '<b>Situação</b> >> Preenchimento obrigatório.',
            'patrimonial_status_date.required'      => '<b>Data Situação</b> >> Preenchimento obrigatório.',
            'patrimonial_status_date.after'         => '<b>Data Situação</b> >> Anterior a Data de Compra.',
            'patrimonial_status_date.date_format'   => '<b>Data Situação</b> >> Inválida.'
        ];
    }
}