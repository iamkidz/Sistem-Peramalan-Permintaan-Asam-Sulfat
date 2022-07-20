<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->request->get('user_id') ? ',' . $this->request->get('user_id') : '';

        return [
            'email' => 'required|string|max:255|unique:users,email' . $id,
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username' . $id,
        ];

    }
}
