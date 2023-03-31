<?php

namespace Domain\Invoice\Services;

use Domain\Invoice\Models\Invoice;

class InvoiceService
{
    public static function update(Invoice $invoice, object $data): Invoice
    {
        $invoice->status = $data->status;
        $invoice->number = $data->number;
        $invoice->vat_percentage = $data->vat_percentage;
        $invoice->sender_vat_number = $data->sender_vat_number;
        $invoice->sender_coc_number = $data->sender_coc_number;
        $invoice->sender_name = $data->sender_name;
        $invoice->sender_address = $data->sender_address;
        $invoice->sender_zip_code = $data->sender_zip_code;
        $invoice->sender_city = $data->sender_city;
        $invoice->sender_country = $data->sender_country;
        $invoice->receiver_vat_number = $data->receiver_vat_number;
        $invoice->receiver_coc_number = $data->receiver_coc_number;
        $invoice->receiver_name = $data->receiver_name;
        $invoice->receiver_address = $data->receiver_address;
        $invoice->receiver_zip_code = $data->receiver_zip_code;
        $invoice->receiver_city = $data->receiver_city;
        $invoice->receiver_country = $data->receiver_country;

        return $invoice;
    }
}
