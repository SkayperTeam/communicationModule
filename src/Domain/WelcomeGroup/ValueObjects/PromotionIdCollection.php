<?php

declare(strict_types=1);

namespace Domain\WelcomeGroup\ValueObjects;

use Shared\Domain\ValueObjects\IntegerId;
use Shared\Domain\ValueObjects\ValueObjectCollection;

/**
 * @extends ValueObjectCollection<int, IntegerId>
 */
final class PromotionIdCollection extends ValueObjectCollection {}