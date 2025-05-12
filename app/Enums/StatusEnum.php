<?php

namespace App\Enums;
enum StatusEnum:string
{
    case CREATED = 'CREATED';
    case PAID = 'PAID';
    case IN_PREPARATION = 'IN_PREPARATION';
    case DELIVERED = 'DELIVERED';
    case CANCELLED = 'CANCELLED';

    public static function values():array{
        return array_column(self::cases(), 'value');
    }
}
