<?php

declare(strict_types=1);

namespace Presentation\Api\DataTransferObjects\DeliveryOrderUpdateData;

use Spatie\LaravelData\Data;

final class CancelInfo extends Data
{
    public function __construct(
        public readonly string $whenCancelled,
        public readonly Cause $cause,
        public readonly ?string $comment
    ) {}
}
