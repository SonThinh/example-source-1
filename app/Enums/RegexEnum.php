<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RegexEnum extends Enum
{
    const FULL = '/^[ａ-ｚＡ-Ｚ一-龠々-〇ぁ-んァ-ヶ０-９ー・]+$/u';

    const NUMBER = '/^[0-9]+$/u';

    const ADDRESS = '/^[a-zA-Z0-9ａ-ｚＡ-Ｚ一-龠々-〇ぁ-んァ-ヶー０-９－−・　 ‐-]+$/u';
}
