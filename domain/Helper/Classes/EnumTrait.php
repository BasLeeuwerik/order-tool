<?php

namespace Domain\Helper\Classes;

trait EnumTrait
{
    public static function convertToDropdownList(): array
    {
        $result = [];

        foreach (static::cases() as $case) {
            $result[$case->value] = $case->value;
        }

        return $result;
    }
}
