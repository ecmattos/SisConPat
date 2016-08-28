<?php

namespace SisConPat\Http\Requests;

use SisConPat\Http\Requests\Request;

class PatrimonialMovementTypeRequest extends Request
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
            'code' => 'max:5|required|unique:patrimonial_movement_types,code,'.$this->id.',id,deleted_at,NULL',
            'description' => 'max:20|required|unique:patrimonial_movement_types,description,'.$this->id.',id,deleted_at,NULL'
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
            'description.unique' => '<b>Descrição</b> >> Indisponível.'
        ];
    }
}
