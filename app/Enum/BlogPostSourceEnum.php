<?php

namespace App\Enum;

enum BlogPostSourceEnum: string
{

    case App = 'app';
    case Api = 'api';


    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

}
