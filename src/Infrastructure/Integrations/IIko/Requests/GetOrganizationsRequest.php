<?php

declare(strict_types=1);

namespace Infrastructure\Integrations\IIko\Requests;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Client\Response;
use Infrastructure\Integrations\IIko\DataTransferObjects\GetOrganizationRequestData;
use Shared\Integrations\RequestInterface;
use Shared\Integrations\RequestMethod;
use Shared\Integrations\ResponseData;
use Shared\Integrations\ResponseDataInterface;

final readonly class GetOrganizationsRequest implements RequestInterface, ResponseDataInterface
{
    public function __construct(private GetOrganizationRequestData $getOrganizationRequestData) {}

    public function method(): RequestMethod
    {
        return RequestMethod::POST;
    }

    public function endpoint(): string
    {
        return '/organizations';
    }

    public function data(): array|Arrayable
    {
        return $this->getOrganizationRequestData;
    }

    public function createDtoFromResponse(Response $response): ResponseData {}
}