<?php

declare(strict_types=1);

namespace Presentation\Api\DataTransferObjects\DeliveryOrderUpdateData;

use Spatie\LaravelData\Data;

final class Conception extends Data
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $code
    ) {}
}