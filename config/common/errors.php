<?php

declare(strict_types=1);

use App\ErrorHandler\LogErrorHandler;
use App\ErrorHandler\SentryDecorator;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Interfaces\CallableResolverInterface;
use Slim\Middleware\ErrorMiddleware;

return [
    ErrorMiddleware::class => static function (ContainerInterface $container): ErrorMiddleware {
        /** @var CallableResolverInterface $callableResolver */
        $callableResolver = $container->get(CallableResolverInterface::class);
        /** @var ResponseFactoryInterface $responseFactory */
        $responseFactory = $container->get(ResponseFactoryInterface::class);
        /**
         * @psalm-suppress MixedArrayAccess
         * @psalm-var array{display_details:bool} $config
         */
        $config = $container->get('config')['errors'];

        $middleware = new ErrorMiddleware(
            $callableResolver,
            $responseFactory,
            $config['display_details'],
            true,
            true
        );

        $middleware->setDefaultErrorHandler(
            new SentryDecorator(
                new LogErrorHandler($callableResolver, $responseFactory)
            )
        );

        return $middleware;
    },

    'config' => [
        'errors' => [
            'display_details' => (bool)getenv('APP_DEBUG'),
        ],
    ],
];
