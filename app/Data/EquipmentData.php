<?php

namespace App\Data;

use App\Contracts\Data\EquipmentDataInterface;
use Carbon\CarbonImmutable;
use DateTime;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class EquipmentData extends Data implements EquipmentDataInterface
{
    public function __construct(
        public ?int $id,
        #[WithCast(DateTimeInterfaceCast::class, type: CarbonImmutable::class)]
        public ?DateTime $created_at,
        #[WithCast(DateTimeInterfaceCast::class, type: CarbonImmutable::class)]
        public ?DateTime $updated_at,
        #[WithCast(DateTimeInterfaceCast::class, type: CarbonImmutable::class)]
        public ?DateTime $deleted_at,
    ) {}
}
