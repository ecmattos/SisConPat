<?php

namespace SisConPat\Http\Requests;

use SisConPat\Http\Requests\Request;

class ServiceRequest extends Request
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
            'code'          => 'max:10|required|unique:services,code,'.$this->id.',id,deleted_at,NULL',
            'description'   => 'max:202|required|unique:services,description,'.$this->id.',id,deleted_at,NULL',
            'unit'          => 'max:5|required',
            //
        ];
    }

    public function messages()
    {
        return [
            'code.max'              => '<b>Código</b> >> MÁXIMO 10 caracteres.',
            'code.required'         => '<b>Código</b> >> Preenchimento obrigatório.',
            'code.unique'           => '<b>Código</b> >> Indisponível.',
           
            'description.max'       => '<b>Descrição</b> >> MÁXIMO 200 caracteres.',
            'description.required'  => '<b>Descrição</b> >> Preenchimento obrigatório.',
            'description.unique'    => '<b>Descrição</b> >> Indisponível.',

            'unit.max'              => '<b>Unidade</b> >> MÁXIMO 5 caracteres.',
            'unit.required'         => '<b>Unidade</b> >> Preenchimento obrigatório.'
        ];
    }
}
