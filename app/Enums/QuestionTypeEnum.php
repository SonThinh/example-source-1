<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class QuestionTypeEnum extends Enum
{
    const CHECKBOX = 'checkbox';

    const RADIO = 'radio';

    const SEGMENTED = 'segmented';

    const DROPDOWN = 'dropdown';

    const UPLOAD_IMAGES = 'upload-images';

    const INPUT = 'input';

    const MULTI_INPUT = 'multi_input';

    const TEXTAREA = 'textarea';

    const PRIVACY = 'privacy';

    const ADDRESS = 'address';

    const EMAIL = 'email';

    const BIRTHDAY = 'birthday';

    public static function isGroupTypePullDown($type): bool
    {
        return in_array($type, [
            self::DROPDOWN,
            self::RADIO,
            self::SEGMENTED,
        ]);
    }

    public static function isGroupCheckBox($type): bool
    {
        return $type == self::CHECKBOX;
    }

    public static function isGroupInput($type): bool
    {
        return in_array($type, [
            self::INPUT,
            self::TEXTAREA,
        ]);
    }

    public static function isGroupSplit($type): bool
    {
        return in_array($type, [
            self::MULTI_INPUT,
        ]);
    }
}
