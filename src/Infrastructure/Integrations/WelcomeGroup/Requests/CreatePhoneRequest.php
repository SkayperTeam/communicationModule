<?php

declare(strict_types=1);

namespace Infrastructure\Integrations\WelcomeGroup\Requests;

use Illuminate\Http\Client\Response;
use Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\CreateClientRequestData;
use Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\CreateClientResponseData;
use Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\CreatePhoneRequestData;
use Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\CreatePhoneResponseData;
use Shared\Infrastructure\Integrations\RequestInterface;
use Shared\Infrastructure\Integrations\RequestMethod;
use Shared\Infrastructure\Integrations\ResponseDataInterface;

final readonly class CreatePhoneRequest implements RequestInterface, ResponseDataInterface
{
    public function __construct(private CreatePhoneRequestData $data) {}

    public function method(): RequestMethod
    {
        return RequestMethod::POST;
    }

    public function endpoint(): string
    {
        return '/api/phone';
    }

    /**
     * @return array<string, string>
     */
    public function data(): array
    {
        return $this->data->toArray();
    }

    /**
     * @param Response $response
     * @return CreatePhoneResponseData
     */
    public function createDtoFromResponse(Response $response): CreatePhoneResponseData
    {
        return CreatePhoneResponseData::from($response->json());
    }

    /**
     * @return array<string, string>
     */
    public function headers(): array
    {
        return [];
    }
}