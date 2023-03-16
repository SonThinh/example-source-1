<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RegexEnum extends Enum
{
    const FULL_WIDTH_JAPANESE = '/^[ａ-ｚＡ-Ｚ一-龠々-〇ぁ-んァ-ヶ０-９ー・]+$/u';

    const FULL_WITHOUT_SPECIAL = '/^[^\;\<\=\>\/\[\]\{\|\}\\\\]+$/u';

    const KATA_FULL_WIDTH = '/^[ァ-ヶー・]+$/u';

    const NUMBER = '/^[0-9]+$/u';

    const ADDRESS = '/^[a-zA-Z0-9ａ-ｚＡ-Ｚ一-龠々-〇ぁ-んァ-ヶー０-９－−・　 ‐-]+$/u';

    const EMAIL = '/^[a-zA-Z0-9]{1}[a-zA-Z0-9_.-]*[a-zA-Z0-9]{1}@{1}[a-zA-Z0-9_-]{1,}(?:\.[a-zA-Z0-9_-]+)+$/u';

    const BIRTHDAY = '/^(?:19\d{2}|20\d{2})(?:0[1-9]|1[0-2])(?:0[1-9]|1[0-9]|(?(?<=02)2[0-8]|2[0-9])|(?<=[02468][0,4,8]02)29|(?<=[13579][2,6]02)29|(?<=0[469]|11)30|(?<=0[13578]|1[02])3[01])$/u';
}
