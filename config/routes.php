<?php

declare(strict_types=1);

use App\Http\Action;
use Slim\App;
use Slim\Handlers\Strategies\RequestHandler;

return static function (App $app): void {
    $routeCollector = $app->getRouteCollector();
    $routeCollector->setDefaultInvocationStrategy(new RequestHandler(true));

    $app->get('/', Action\HomeAction::class);
    $app->get('/api/indicators/{id}', Action\Indicator\ShowAction::class . ':handle');
    $app->post('/api/indicators', Action\Indicator\CreateAction::class . ':handle');
};
