<?php

declare(strict_types=1);

namespace Infrastructure\Persistence\Eloquent\IIko\Models\Repositories;

use Domain\Iiko\Entities\Menu\Menu;
use Domain\Iiko\Repositories\IikoMenuRepositoryInterface;
use Infrastructure\Persistence\Eloquent\IIko\Models\Menu\IikoMenu;
use Shared\Domain\ValueObjects\StringId;
use Shared\Persistence\Repositories\AbstractPersistenceRepository;

/**
 * @extends AbstractPersistenceRepository<IikoMenu>
 */
final class IikoMenuRepository extends AbstractPersistenceRepository implements IikoMenuRepositoryInterface
{
    public function findByExternalId(StringId $externalId): ?Menu
    {
        $result = $this->findEloquentByExternalId($externalId);

        if (! $result) {
            return null;
        }

        return IikoMenu::toDomainEntity($result);
    }

    public function createOrUpdate(Menu $menu): Menu
    {
        $iikoMenu = $this->findEloquentByExternalId($menu->externalId) ?? new IikoMenu();

        $iikoMenu->fromDomainEntity($menu);
        $iikoMenu->save();

        return IikoMenu::toDomainEntity($iikoMenu);
    }

    private function findEloquentByExternalId(StringId $externalId): ?IikoMenu
    {
        return $this
            ->query()
            ->where('external_id', $externalId->id)
            ->first();
    }
}