<?php

namespace SisConPat\Http\Requests;

use SisConPat\Http\Requests\Request;

class RoleRequest extends Request
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
            'role_title' => 'max:20|required|unique:roles,role_title,'.$this->id.',id,deleted_at,NULL'
            //
        ];
    }

    public function messages()
    {
        return [
            'role_title.max' => '<b>Descrição</b> >> MÁXIMO 20 caracteres.',
            'role_title.required' => '<b>Descrição</b> >> Preenchimento obrigatório.',
            'role_title.unique' => '<b>Descrição</b> >> Indisponível.'
        ];
    }
}
