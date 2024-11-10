<?php

declare(strict_types=1);

namespace Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\Order;

use Carbon\CarbonImmutable;
use Domain\WelcomeGroup\Entities\Phone;
use Shared\Domain\ValueObjects\IntegerId;
use Shared\Infrastructure\Integrations\ResponseData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapOutputName(SnakeCaseMapper::class)]
final class PromotionData extends ResponseData
{
    public function __construct(public readonly int $id) {}

    public function toDomainEntity(): IntegerId
    {
        return new IntegerId($this->id);
    }
}

