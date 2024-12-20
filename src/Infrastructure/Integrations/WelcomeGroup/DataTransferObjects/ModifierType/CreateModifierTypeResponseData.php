<?php

declare(strict_types=1);

namespace Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\ModifierType;

use Carbon\CarbonImmutable;
use Domain\WelcomeGroup\Entities\ModifierType;
use Domain\WelcomeGroup\Enums\ModifierTypeBehaviour;
use Shared\Domain\ValueObjects\IntegerId;
use Shared\Infrastructure\Integrations\ResponseData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapOutputName(SnakeCaseMapper::class)]
final class CreateModifierTypeResponseData extends ResponseData
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $behaviour,
        public readonly CarbonImmutable $created,
        public readonly CarbonImmutable $updated,
    ) {}

    public function toDomainEntity(): ModifierType
    {
        return new ModifierType(
            new IntegerId(),
            new IntegerId($this->id),
            new IntegerId(),
            $this->name,
            ModifierTypeBehaviour::from($this->behaviour),
        );
    }
}
