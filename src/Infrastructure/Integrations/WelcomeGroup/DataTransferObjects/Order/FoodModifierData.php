<?php

declare(strict_types=1);

namespace Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\Order;

use Carbon\CarbonImmutable;
use Domain\WelcomeGroup\Entities\FoodModifier;
use Domain\WelcomeGroup\Entities\OrderItem;
use Domain\WelcomeGroup\Entities\Phone;
use Shared\Domain\ValueObjects\IntegerId;
use Shared\Infrastructure\Integrations\ResponseData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapOutputName(SnakeCaseMapper::class)]
final class FoodModifierData extends ResponseData
{
    public function __construct(
        public readonly int $id,
        public readonly float $price,
        public readonly int $weight,
    ) {}

    public function toDomainEntity(): FoodModifier
    {
        return new FoodModifier(
            id: new IntegerId($this->id),
            price: $this->price,
            weight: $this->weight,
        );
    }
}

