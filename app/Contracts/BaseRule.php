<?php

namespace App\Contracts;

interface BaseRule
{
    public static function rule($questionItem, $questions);

    public static function checkRequired($questionItem, $questions): string;
}
