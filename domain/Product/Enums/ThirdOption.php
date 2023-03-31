<?php

namespace Domain\Product\Enums;

use Domain\Helper\Classes\EnumTrait;

enum ThirdOption: string
{
    use EnumTrait;

    case OPTION_3_1 = 'Option 3.1';
    case OPTION_3_2 = 'Option 3.2';
    case OPTION_3_3 = 'Option 3.3';
    case OPTION_3_4 = 'Option 3.4';
    case OPTION_3_5 = 'Option 3.5';
    case OPTION_3_6 = 'Option 3.6';
    case OPTION_3_7 = 'Option 3.7';
    case OPTION_3_8 = 'Option 3.8';
}
