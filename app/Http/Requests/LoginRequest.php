<?php

namespace App\Http\Requests;

class LoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules(): array
    {
        return [
            'login_id' => 'required|max:100|regex:/^[a-zA-Z0-9]+$/u',
            'password' => 'required|max:100',
        ];
    }
}
