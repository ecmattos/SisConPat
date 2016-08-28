<?php

namespace SisConPat\Http\Requests;

use SisConPat\Http\Requests\Request;

class UserEditRequest extends Request
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
            'name' => 'required|max:40|unique:users,name,'.$this->id.',id,deleted_at,NULL',
            'email' => 'required|email|max:50|unique:users,email,'.$this->id.',id,deleted_at,NULL'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '<b>Usuário</b> >> Preenchimento obrigatório.',
            'name.max' => '<b>Usuário</b> >> MÀXIMO 50 caracteres.',
            'name.unique' => '<b>Usuário</b> >> Indisponível.',
            'email.required' => '<b>E-mail</b> >> Preenchimento obrigatório.',
            'email.max' => '<b>E-mail</b> >> MÀXIMO 50 caracteres.',
            'email.unique' => '<b>E-mail</b> >> Indisponível.'
        ];
    }
}
