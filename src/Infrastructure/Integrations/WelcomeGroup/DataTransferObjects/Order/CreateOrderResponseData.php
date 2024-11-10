<?php

declare(strict_types=1);

namespace Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\Order;

use Carbon\CarbonImmutable;
use Domain\WelcomeGroup\Entities\Order;
use Shared\Domain\ValueObjects\IntegerId;
use Shared\Infrastructure\Integrations\ResponseData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapOutputName(SnakeCaseMapper::class)]
final class CreateOrderResponseData extends ResponseData
{
    public function __construct(
        public readonly int $id,
        public readonly CarbonImmutable $created,
        public readonly CarbonImmutable $updated,
        public readonly string $status,
        public readonly ?string $statusComment,
        public readonly string $number,
        public readonly ?CarbonImmutable $start,
        public readonly int $duration,
        public readonly float $price,
        public readonly float $sum,
        public readonly int $discount,
        public readonly int $restaurant,
        public readonly int $client,
        public readonly int $phone,
        public readonly int $address,
        #[DataCollectionOf(PromotionData::class)]
        public readonly DataCollection $promotions,
        public readonly int $coupon,
        public readonly int $driver,
        public readonly ?string $comment,
        public readonly bool $isInternetPayment,
        public readonly bool $isRZDPayment,
        public readonly bool $isBankAccountPayment,
        public readonly bool $isPreorder,
        public readonly int $driverChoiceAlgorithm,
        public readonly ?string $commentWhyDriver,
        public readonly ?CarbonImmutable $estimatedDeliveryTime,
        public readonly int $km,
        public readonly int $durations,
        public readonly ?CarbonImmutable $awaitingCooking,
        public readonly ?CarbonImmutable $awaitingDelivery,
        public readonly int $timeProduction,
        public readonly bool $lateness,
        public readonly int $couponLateness,
        public readonly ?string $couponLatenessCode,
        public readonly int $productionTime,
        public readonly int $timeDelivery,
        public readonly string $statusProcessRouting,
        public readonly int $source,
        #[DataCollectionOf(OrderItemData::class)]
        public readonly DataCollection $orderItems,
    ) {}

    public function toDomainEntity(): Order
    {
        return new Order(
            new IntegerId($this->id),
            $this->created,
            $this->updated,
            $this->status,
            $this->statusComment,
            $this->number,
            $this->start,
            $this->duration,
            $this->price,
            $this->sum,
            $this->discount,
            new IntegerId($this->restaurant),
            new IntegerId($this->client),
            new IntegerId($this->phone),
            new IntegerId($this->address),
            $this->promotions->toDomainEntities(),
            $this->coupon,
            $this->driver,
            $this->comment,
            $this->isInternetPayment,
            $this->isRZDPayment,
            $this->isBankAccountPayment,
            $this->isPreorder,
            $this->driverChoiceAlgorithm,
            $this->commentWhyDriver,
            $this->estimatedDeliveryTime,
            $this->km,
            $this->durations,
            $this->awaitingCooking,
            $this->awaitingDelivery,
            $this->timeProduction,
            $this->lateness,
            $this->couponLateness,
            $this->couponLatenessCode,
            $this->productionTime,
            $this->timeDelivery,
            $this->statusProcessRouting,
            $this->source,
            $this->orderItems->toDomainEntities(),
        );
    }
}
