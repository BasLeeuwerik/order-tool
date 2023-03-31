<?php

namespace Domain\Product\Enums;

use Domain\Helper\Classes\EnumTrait;

enum SecondFirstOptions: string
{
    use EnumTrait;

    case OPTION_2_1_1 = 'Option 2.1.1';
    case OPTION_2_1_2 = 'Option 2.1.2';
    case OPTION_2_1_3 = 'Option 2.1.3';
    case OPTION_2_1_4 = 'Option 2.1.4';
    case OPTION_2_1_5 = 'Option 2.1.5';
}
