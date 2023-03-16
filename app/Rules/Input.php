<?php

namespace App\Rules;

use Illuminate\Support\Arr;

class Input extends BaseRule
{
    /**
     * @param $questionItem
     * @param $questions
     * @return array
     */
    public static function rule($questionItem, $questions): array
    {
        $required = self::checkRequired($questionItem, $questions);

        $dataRule["question.{$questionItem->id}.value"] = [
            $required,
            "min:{$questionItem->options['min_length']}",
            "max:{$questionItem->options['max_length']}",
        ];

        if (Arr::get($questionItem->options, 'regex')) {
            $dataRule["question.{$questionItem->id}.value"][] = "regex:".Arr::get($questionItem->options, 'regex');
        }

        return $dataRule;
    }
}
