<?php

declare(strict_types=1);

namespace Domain\WelcomeGroup\ValueObjects;

use Domain\WelcomeGroup\Entities\FoodModifier;
use Shared\Domain\ValueObjects\ValueObjectCollection;

/**
 * @extends ValueObjectCollection<int, FoodModifier>
 */
final class FoodModifierCollection extends ValueObjectCollection {}