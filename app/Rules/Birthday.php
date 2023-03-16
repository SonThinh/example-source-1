<?php

namespace App\Rules;

use Illuminate\Support\Arr;

class Birthday extends BaseRule
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
        ];

        if (Arr::has($questionItem->options, 'regex')) {
            $dataRule["question.{$questionItem->id}.value"][] = "regex:".Arr::get($questionItem->options, 'regex');
        }

        return $dataRule;
    }
}
