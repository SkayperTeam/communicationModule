<?php

declare(strict_types=1);

namespace Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\Order;

use Carbon\CarbonImmutable;
use Domain\WelcomeGroup\Entities\OrderItem;
use Domain\WelcomeGroup\Entities\Phone;
use Shared\Domain\ValueObjects\IntegerId;
use Shared\Infrastructure\Integrations\ResponseData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapOutputName(SnakeCaseMapper::class)]
final class OrderItemData extends ResponseData
{
    public function __construct(
        public readonly int $id,
        public readonly string $status,
        public readonly ?string $statusComment,
        public readonly ?string $comment,
        public readonly int $food,
        #[DataCollectionOf(FoodModifierData::class)]
        public readonly DataCollection $foodModifiers,
        public readonly float $price,
        public readonly float $discount,
        public readonly float $sum,
    ) {}

    public function toDomainEntity(): OrderItem
    {
        return new OrderItem(
            id: new IntegerId($this->id),
            status: $this->status,
            statusComment: $this->statusComment,
            comment: $this->comment,
            foodId: new IntegerId($this->food),
            foodModifiers: $this->foodModifiers->toDomainEntities(),
            price: $this->price,
            discount: $this->discount,
            sum: $this->sum,
        );
    }
}

