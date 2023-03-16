<?php

namespace App\Rules;

use Illuminate\Support\Arr;

class Address extends BaseRule
{
    /**
     * @param $questionItem
     * @param $questions
     * @return array
     */
    public static function rule($questionItem, $questions): array
    {
        $dataRule = [];
        $required = self::checkRequired($questionItem, $questions);

        if (! empty($questionItem->options['key'])) {
            $dataRule["question.{$questionItem->id}.value"] = [
                $required,
                //"min:{$questionItem->options['min_length']}",
                //"max:{$questionItem->options['max_length']}",
            ];
        }

        if (Arr::get($questionItem->options, 'regex')) {
            $dataRule["question.{$questionItem->id}.value"][] = "regex:".Arr::get($questionItem->options, 'regex');
        }

        return $dataRule;
    }
}
