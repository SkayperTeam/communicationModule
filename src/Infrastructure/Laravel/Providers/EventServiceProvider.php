<?php

declare(strict_types=1);

namespace Infrastructure\Laravel\Providers;

use Application\Iiko\Events\DeliveryOrderErrorEvent;
use Application\Iiko\Events\DeliveryOrderUpdateEvent;
use Application\Iiko\Events\StopListUpdateEvent;
use Domain\Iiko\Events\ItemCreatedEvent;
use Domain\Iiko\Events\ItemGroupCreatedEvent;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as LaravelEventServiceProvider;
use Infrastructure\Listeners\Iiko\DeliveryOrderErrorListener;
use Infrastructure\Listeners\Iiko\DeliveryOrderUpdateListener;
use Infrastructure\Listeners\Iiko\StopListUpdateListener;
use Infrastructure\Listeners\WelcomeGroup\SendCreatedFoodCategoryListener;
use Infrastructure\Listeners\WelcomeGroup\SendCreatedFoodListener;

final class EventServiceProvider extends LaravelEventServiceProvider
{
    protected $listen = [
        StopListUpdateEvent::class => [
            StopListUpdateListener::class,
        ],
        DeliveryOrderErrorEvent::class => [
            DeliveryOrderErrorListener::class,
        ],
        DeliveryOrderUpdateEvent::class => [
            DeliveryOrderUpdateListener::class,
        ],
        ItemGroupCreatedEvent::class => [
            SendCreatedFoodCategoryListener::class,
        ],
        ItemCreatedEvent::class => [
            SendCreatedFoodListener::class,
        ],
    ];
}