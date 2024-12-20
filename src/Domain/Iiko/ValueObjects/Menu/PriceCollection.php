<?php

declare(strict_types=1);

namespace Domain\Iiko\ValueObjects\Menu;

use Domain\Iiko\Entities\Menu\Price;
use Shared\Domain\ValueObjects\ValueObjectCollection;

/**
 * @extends ValueObjectCollection<array-key, Price>
 */
final class PriceCollection extends ValueObjectCollection {}
