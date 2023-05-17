<?php

namespace App\Contracts\Data;

interface BaseDataInterface
{
    public static function from(mixed ...$payloads);
}
