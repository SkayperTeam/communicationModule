<?php

declare(strict_types=1);

namespace Application\WelcomeGroup\Builders;

use Domain\WelcomeGroup\Entities\Modifier;
use Shared\Domain\ValueObjects\IntegerId;
use Shared\Domain\ValueObjects\StringId;

final class ModifierBuilder
{
    public function __construct(
        private IntegerId $id,
        private IntegerId $internalModifierTypeId,
        private IntegerId $internalIikoItemId,
        private IntegerId $externalId,
        private IntegerId $externalModifierTypeId,
        private StringId $iikoExternalModifierId,
        private string $name,
        private bool $isDefault,
    ) {}

    public static function fromExisted(Modifier $modifier): self
    {
        return new self(
            $modifier->id,
            $modifier->internalModifierTypeId,
            $modifier->internalIikoItemId,
            $modifier->externalId,
            $modifier->externalModifierTypeId,
            $modifier->iikoExternalModifierId,
            $modifier->name,
            $modifier->isDefault,
        );
    }

    public function setId(IntegerId $id): ModifierBuilder
    {
        $clone = clone $this;
        $clone->id = $id;

        return $clone;
    }

    public function setInternalModifierTypeId(IntegerId $internalModifierTypeId): ModifierBuilder
    {
        $clone = clone $this;
        $clone->internalModifierTypeId = $internalModifierTypeId;

        return $clone;
    }

    public function setExternalId(IntegerId $externalId): ModifierBuilder
    {
        $clone = clone $this;
        $clone->externalId = $externalId;

        return $clone;
    }

    public function setExternalModifierTypeId(IntegerId $externalModifierTypeId): ModifierBuilder
    {
        $clone = clone $this;
        $clone->externalModifierTypeId = $externalModifierTypeId;

        return $clone;
    }

    public function setName(string $name): ModifierBuilder
    {
        $clone = clone $this;
        $clone->name = $name;

        return $clone;
    }

    public function setIsDefault(bool $isDefault): ModifierBuilder
    {
        $clone = clone $this;
        $clone->isDefault = $isDefault;

        return $clone;
    }

    public function setIikoExternalModifierId(StringId $iikoExternalModifierId): ModifierBuilder
    {
        $clone = clone $this;
        $clone->iikoExternalModifierId = $iikoExternalModifierId;

        return $clone;
    }

    public function setInternalIikoItemId(IntegerId $internalIikoItemId): ModifierBuilder
    {
        $clone = clone $this;
        $clone->internalIikoItemId = $internalIikoItemId;

        return $clone;
    }

    public function build(): Modifier
    {
        return new Modifier(
            $this->id,
            $this->internalModifierTypeId,
            $this->internalIikoItemId,
            $this->externalId,
            $this->externalModifierTypeId,
            $this->iikoExternalModifierId,
            $this->name,
            $this->isDefault,
        );
    }
}
