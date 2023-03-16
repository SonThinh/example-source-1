<?php

namespace App\Rules;

use Illuminate\Support\Arr;

class Split extends BaseRule
{
    /**
     * @param $questionItem
     * @param $questions
     * @return array
     */
    public static function rule($questionItem, $questions): array
    {
        $required = self::checkRequired($questionItem, $questions);

        $data = [];

        for ($i = 0; $i < $questionItem->options['count_field']; $i++) {
            $data["question.{$questionItem->id}.value.{$i}"] = [
                $required,
                'min:' . (empty($questionItem->options['min_length'][$i]) ? 0 : $questionItem->options['min_length'][$i]),
                'max:' . (empty($questionItem->options['max_length'][$i]) ? 0 : $questionItem->options['max_length'][$i]),
            ];

            if (! empty(Arr::get($questionItem->options, 'regex')[$i])) {
                $data["question.{$questionItem->id}.value.{$i}"][] = 'regex:' . Arr::get($questionItem->options, 'regex')[$i];
            }
        }

        return $data;
    }
}
