<?php

declare(strict_types=1);

namespace Infrastructure\Persistence\Eloquent\WelcomeGroup\Repositories;

use Domain\WelcomeGroup\Entities\Modifier;
use Domain\WelcomeGroup\Repositories\WelcomeGroupModifierRepositoryInterface;
use Infrastructure\Persistence\Eloquent\WelcomeGroup\Models\WelcomeGroupModifier;
use Shared\Persistence\Repositories\AbstractPersistenceRepository;

/**
 * @extends AbstractPersistenceRepository<WelcomeGroupModifier>
 */
final class WelcomeGroupModifierRepository extends AbstractPersistenceRepository implements WelcomeGroupModifierRepositoryInterface
{
    public function save(Modifier $modifierType): Modifier
    {
        $welcomeGroupModifier = new WelcomeGroupModifier();

        $welcomeGroupModifier->fromDomainEntity($modifierType);
        $welcomeGroupModifier->save();

        return WelcomeGroupModifier::toDomainEntity($welcomeGroupModifier);
    }
}