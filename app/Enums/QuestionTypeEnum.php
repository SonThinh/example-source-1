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

    const TEXTAREA = 'textarea';

    const PRIVACY = 'privacy';

    const ADDRESS = 'address';
}
