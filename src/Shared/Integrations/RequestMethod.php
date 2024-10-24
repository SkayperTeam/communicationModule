<?php

declare(strict_types=1);

namespace Shared\Integrations;

enum RequestMethod: string
{
    case GET = 'GET';

    case POST = 'POST';

    case PUT = 'PUT';

    case DELETE = 'DELETE';
}
