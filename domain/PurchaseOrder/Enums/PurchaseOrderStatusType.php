<?php

namespace Domain\PurchaseOrder\Enums;

enum PurchaseOrderStatusType: string
{
    case OPEN = 'open';
    case PAID = 'paid';
    case COMPLETED = 'completed';
}
