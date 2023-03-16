<?php

namespace App\Rules;

use Illuminate\Validation\Rule;

class PullDown extends BaseRule
{
    /**
     * @param $questionItem
     * @param $questions
     * @return array
     */
    public static function rule($questionItem, $questions): array
    {
        $dataRule["question.{$questionItem->id}.value"] = [
            self::checkRequired($questionItem, $questions)
        ];

        if (! empty($questionItem->answers)) {
            $dataRule["question.{$questionItem->id}.value"][] = Rule::in($questionItem->answers);
        }

        return $dataRule;
    }
}
