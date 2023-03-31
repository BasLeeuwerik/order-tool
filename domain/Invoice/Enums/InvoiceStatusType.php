<?php

namespace Domain\Invoice\Enums;

enum InvoiceStatusType: string
{
    case OPEN = 'open';
    case PAID = 'paid';
}
