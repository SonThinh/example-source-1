<?php

namespace App\Rules;

use App\Enums\QuestionTypeEnum;

abstract class BaseRule implements \App\Contracts\BaseRule
{
    /**
     * @param $questionItem
     * @param $questions
     * @return string
     */
    public static function checkRequired($questionItem, $questions): string
    {
        return $questionItem->is_required ? 'required' : 'nullable';
    }
}
