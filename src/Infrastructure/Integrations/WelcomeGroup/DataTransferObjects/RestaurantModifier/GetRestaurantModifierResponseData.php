<?php

declare(strict_types=1);

namespace Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\RestaurantModifier;

use Carbon\CarbonImmutable;
use Domain\WelcomeGroup\Entities\RestaurantModifier;
use Shared\Domain\ValueObjects\IntegerId;
use Shared\Infrastructure\Integrations\ResponseData;

final class GetRestaurantModifierResponseData extends ResponseData
{
    public function __construct(
        public readonly int $id,
        public readonly int $restaurant,
        public readonly int $modifier,
        public readonly ?string $statusComment,
        public readonly string $status,
        public readonly CarbonImmutable $created,
        public readonly CarbonImmutable $updated,
    ) {}

    public function toDomainEntity(): RestaurantModifier
    {
        return new RestaurantModifier(
            new IntegerId($this->id),
            new IntegerId($this->restaurant),
            new IntegerId($this->modifier),
            $this->statusComment,
            $this->status,
            $this->created,
            $this->updated
        );
    }
}