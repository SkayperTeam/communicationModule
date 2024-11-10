<?php

declare(strict_types=1);

namespace Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\Order;

use Shared\Infrastructure\Integrations\ResponseData;

final class CreateOrderRequestData extends ResponseData
{
    public function __construct(
        public readonly int $restaurant,
        public readonly int $client,
        public readonly int $phone,
        public readonly string $address,
        /** @var int[] */
        public readonly array $promotions,
//        public readonly ?int $coupon,
//        public readonly ?int $driver,
//        public readonly ?string $statusComment,
        public readonly string $status, // Это должен быть по-идее enum
//        public readonly string $number,
        public readonly int $duration,
//        public readonly float $price,
//        public readonly float $sum,
        public readonly float $discount,
        public readonly string $comment,
//        public readonly bool $isInternetPayment,
//        public readonly bool $isRZDPayment,
//        public readonly bool $isBankAccountPayment,
        public readonly bool $isPreorder,
//        public readonly int $driverChoiceAlgorithm,
//        public readonly string $commentWhyDriver,
//        public readonly string $estimatedDeliveryTime,
//        public readonly int $km,
//        public readonly int $durations,
//        public readonly int $awaitingCooking,
//        public readonly string $awaitingDelivery,
//        public readonly int $timeProduction,
//        public readonly bool $lateness,
//        public readonly int $couponLateness,
//        public readonly string $couponLatenessCode,
//        public readonly int $productionTime,
//        public readonly int $timeDelivery,
//        public readonly string $statusProcessRouting,
        public readonly int $source, // По-идее должен быть enum, но важно, что определяется за счёт того, что берётся из сопоставления указанного при создании ресторана, но необходимо оговорить значение по умолчанию
    ) {}
}
