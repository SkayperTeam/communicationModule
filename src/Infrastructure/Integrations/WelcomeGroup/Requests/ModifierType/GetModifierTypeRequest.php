<?php

declare(strict_types=1);

namespace Infrastructure\Integrations\WelcomeGroup\Requests\ModifierType;

use Illuminate\Http\Client\Response;
use Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\ModifierType\GetModifierTypeResponseData;
use Shared\Infrastructure\Integrations\RequestInterface;
use Shared\Infrastructure\Integrations\RequestMethod;
use Shared\Infrastructure\Integrations\ResponseDataInterface;

final readonly class GetModifierTypeRequest implements RequestInterface, ResponseDataInterface
{
    public function __construct(private int $id, private ?array $data = []) {}

    public function method(): RequestMethod
    {
        return RequestMethod::GET;
    }

    public function endpoint(): string
    {
        return '/api/modifier_type/'.$this->id;
    }

    /**
     * @return array<string, string>
     */
    public function data(): array
    {
        return $this->data ?? [];
    }

    public function createDtoFromResponse(Response $response): GetModifierTypeResponseData
    {
        return GetModifierTypeResponseData::from($response->json());
    }

    /**
     * @return array<string, string>
     */
    public function headers(): array
    {
        return [];
    }
}
