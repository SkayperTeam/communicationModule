<?php

declare(strict_types=1);

namespace Presentation\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;
use Spatie\RouteAttributes\Attributes\Route;

final readonly class WelcomeController
{
    public function __construct(private ResponseFactory $responseFactory) {}

    #[Route(methods: 'GET', uri: '/', name: 'welcome')]
    public function __invoke(): Response
    {
        return $this->responseFactory->view('welcome');
    }
}
