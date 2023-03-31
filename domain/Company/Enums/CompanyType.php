<?php

namespace Domain\Company\Enums;

enum CompanyType: string
{
    case CLIENT = 'client';
    case SUPPLIER = 'supplier';
    case TESTCOMPANY = 'testcompany';
}
