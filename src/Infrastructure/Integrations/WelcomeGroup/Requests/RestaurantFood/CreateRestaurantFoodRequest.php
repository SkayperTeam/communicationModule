<?php

declare(strict_types=1);

namespace Infrastructure\Integrations\WelcomeGroup\Requests\RestaurantFood;

use Illuminate\Http\Client\Response;
use Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\Address\CreateFoodResponseData;
use Infrastructure\Integrations\WelcomeGroup\DataTransferObjects\RestaurantModifier\CreateRestaurantModifierRequestData;
use Shared\Infrastructure\Integrations\RequestInterface;
use Shared\Infrastructure\Integrations\RequestMethod;
use Shared\Infrastructure\Integrations\ResponseDataInterface;

final readonly class CreateRestaurantFoodRequest implements RequestInterface, ResponseDataInterface
{
    public function __construct(private CreateRestaurantModifierRequestData $data) {}

    public function method(): RequestMethod
    {
        return RequestMethod::POST;
    }

    public function endpoint(): string
    {
        return '/api/restaurant_food';
    }

    /**
     * @return array<string, string>
     */
    public function data(): array
    {
        return $this->data->toArray();
    }

    public function createDtoFromResponse(Response $response): CreateFoodResponseData
    {
        return CreateFoodResponseData::from($response->json());
    }

    /**
     * @return array<string, string>
     */
    public function headers(): array
    {
        return [];
    }
}