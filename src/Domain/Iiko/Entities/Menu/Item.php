<?php

declare(strict_types=1);

namespace Domain\Iiko\Entities\Menu;

use Domain\Iiko\ValueObjects\Menu\ItemSizeCollection;
use Domain\Iiko\ValueObjects\Menu\PriceCollection;
use Shared\Domain\DomainEntity;
use Shared\Domain\ValueObjects\IntegerId;
use Shared\Domain\ValueObjects\StringId;

final class Item extends DomainEntity
{
    /**
     * @param  PriceCollection<array-key, Price>  $prices
     * @param  ItemSizeCollection<array-key, ItemSize>  $itemSizes
     */
    public function __construct(
        public readonly IntegerId $id,
        public readonly IntegerId $itemGroupId,
        public readonly StringId $externalId,
        public readonly string $sku,
        public readonly string $name,
        public readonly ?string $description,
        public readonly ?string $type,
        public readonly ?string $measureUnit,
        public readonly ?string $paymentSubject,
        public readonly bool $isHidden,
        public readonly ?int $weight,
        public readonly PriceCollection $prices,
        public readonly ItemSizeCollection $itemSizes,
    ) {}
}
