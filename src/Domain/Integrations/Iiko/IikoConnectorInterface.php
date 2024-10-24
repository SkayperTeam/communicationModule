<?php

declare(strict_types=1);

namespace Domain\Integrations\Iiko;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Shared\Integrations\RequestInterface;
use Shared\Integrations\ResponseData;

interface IikoConnectorInterface
{
    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function send(RequestInterface $request): Response|ResponseData;

    /**
     * @return iterable<Response|ResponseData>
     */
    public function sendAsync(RequestInterface ...$requests): iterable;
}
