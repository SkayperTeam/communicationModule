<?php

declare(strict_types=1);

namespace Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\Phone;

use Shared\Infrastructure\Integrations\ResponseData;

final class CreatePhoneRequestData extends ResponseData
{
    public function __construct(
        public readonly string $number,
    ) {}
}