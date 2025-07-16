<?php

namespace XaviCabot\Laravel\Holded\Enums;

class DocumentType
{
    public const INVOICE          = 'invoice';
    public const SALES_RECEIPT    = 'salesreceipt';
    public const CREDIT_NOTE      = 'creditnote';
    public const SALES_ORDER      = 'salesorder';
    public const PROFORM          = 'proform';
    public const WAYBILL          = 'waybill';
    public const ESTIMATE         = 'estimate';
    public const PURCHASE         = 'purchase';
    public const PURCHASE_ORDER   = 'purchaseorder';
    public const PURCHASE_REFUND  = 'purchaserefund';

    public static function all(): array
    {
        return [
            self::INVOICE,
            self::SALES_RECEIPT,
            self::CREDIT_NOTE,
            self::SALES_ORDER,
            self::PROFORM,
            self::WAYBILL,
            self::ESTIMATE,
            self::PURCHASE,
            self::PURCHASE_ORDER,
            self::PURCHASE_REFUND,
        ];
    }

    public static function isValid(string $type): bool
    {
        return in_array($type, self::all(), true);
    }
}
