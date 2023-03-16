<?php

namespace App\Rules;

use Illuminate\Support\Arr;

class Email extends BaseRule
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

        if (Arr::has($questionItem->options, 'regex')) {
            $dataRule["question.{$questionItem->id}.value"][] = "regex:".Arr::get($questionItem->options, 'regex');
        }

        if (Arr::has($questionItem->options, 'confirm_with')) {
            $dataRule["question.{$questionItem->id}.value"][] = new ConfirmedFiedRule($questions[Arr::get($questionItem->options, 'confirm_with')]['value']);
        }

        return $dataRule;
    }
}
