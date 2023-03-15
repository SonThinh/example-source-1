<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum;
use Illuminate\Validation\Rule;

class StoreAdminRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'login_id' => [
                'required',
                'max:100',
                'unique:admins,login_id',
                'regex:/^[a-zA-Z0-9]+$/u',
            ],
            'name'     => [
                'required',
                'string',
                'max:100',
                'regex:/^[^\;\<\=\>\/\[\]\{\|\}\\\\]+$/u',
            ],
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:8',
                'regex:/^(?=.{8,})[a-zA-Z0-9!@#$%^&*()_+\'\-=\\[\]{};:\"\\|,.<>\\/?~]*$/u',
            ],
            'role'     => [
                'required',
                'string',
                Rule::in(RoleEnum::asArray()),
            ],
            'status'   => [
                'required',
                'boolean',
            ],
        ];
    }
}
