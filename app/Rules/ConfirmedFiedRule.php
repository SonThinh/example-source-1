<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ConfirmedFiedRule implements Rule
{
    private string $data;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (strcmp($this->data, $value) == 0) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attributeが確認用の値と一致しません。';
    }
}
