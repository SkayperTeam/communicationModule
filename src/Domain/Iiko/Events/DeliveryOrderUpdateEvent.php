<?php

declare(strict_types=1);

namespace Domain\Iiko\Events;

use Domain\Iiko\Interfaces\WebhookEventInterface;

final class DeliveryOrderUpdateEvent implements WebhookEventInterface
{
    public function __construct() {}
}