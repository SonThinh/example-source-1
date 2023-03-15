<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'     => [
                'sometimes',
                'required',
                'string',
                'max:100',
                'regex:/^[^\;\<\=\>\/\[\]\{\|\}\\\\]+$/u',
            ],
            'password' => [
                'sometimes',
                'required',
                'string',
                'confirmed',
                'min:8',
                'regex:/^(?=.{8,})[a-zA-Z0-9!@#$%^&*()_+\'\-=\\[\]{};:\"\\|,.<>\\/?~]*$/u',
            ],
            'role'     => [
                'sometimes',
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
