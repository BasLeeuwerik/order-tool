<?php

namespace Domain\PurchaseOrder\Enums;

enum DiscountCodeStatusType: string
{
    case OPEN = 'open';
    case CLOSED = 'closed';
}
