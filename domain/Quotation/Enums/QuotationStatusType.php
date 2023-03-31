<?php

namespace Domain\Quotation\Enums;

enum QuotationStatusType: string
{
    case OPEN = 'open';
    case CLOSED = 'closed';
}
