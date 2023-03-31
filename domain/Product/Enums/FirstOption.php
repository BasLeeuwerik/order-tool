<?php

namespace Domain\Product\Enums;

use Domain\Helper\Classes\EnumTrait;

enum FirstOption: string
{
    use EnumTrait;

    case OPTION_1_1 = 'Option 1.1';
    case OPTION_1_2 = 'Option 1.2';
}
