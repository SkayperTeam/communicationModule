<?php

declare(strict_types=1);

namespace Infrastructure\Integrations\IIko\Requests;

use Illuminate\Http\Client\Response;
use Infrastructure\Integrations\IIko\DataTransferObjects\GetMenuRequestData;
use Infrastructure\Integrations\IIko\DataTransferObjects\GetMenuResponse\GetMenuResponseData;
use Shared\Infrastructure\Integrations\RequestInterface;
use Shared\Infrastructure\Integrations\RequestMethod;
use Shared\Infrastructure\Integrations\ResponseDataInterface;

final readonly class GetMenuRequest implements RequestInterface, ResponseDataInterface
{
    private const VERSION = 3;

    public function __construct(
        private GetMenuRequestData $getMenuRequestData,
        private string $authToken,
    ) {}

    public function method(): RequestMethod
    {
        return RequestMethod::POST;
    }

    public function endpoint(): string
    {
        return '/api/2/menu/by_id';
    }

    /**
     * @return array<string, string|int>
     */
    public function data(): array
    {
        return [
            'version' => self::VERSION,
            ...$this->getMenuRequestData->toArray(),
        ];
    }

    public function createDtoFromResponse(Response $response): GetMenuResponseData
    {
        return GetMenuResponseData::from($response->json());
    }

    /**
     * @return array<string, string>
     */
    public function headers(): array
    {
        return ['Authorization' => sprintf('Bearer %s', $this->authToken)];
    }
}
