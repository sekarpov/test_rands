<?php

declare(strict_types=1);

namespace App\Http\Action\Indicator;

use App\Http\JsonResponse;
use App\Http\Validator\Validator;
use App\Indicators\Command\Generate\Command;
use App\Indicators\Command\Generate\Handler;
use App\Indicators\Entity\Indicator\Id;
use App\Indicators\Entity\Indicator\Indicator;
use App\Indicators\Entity\Indicator\IndicatorRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CreateAction implements RequestHandlerInterface
{
    private Handler $handler;
    private IndicatorRepository $indicators;
    private Validator $validator;

    public function __construct(Handler $handler, IndicatorRepository $indicators, Validator $validator)
    {
        $this->handler = $handler;
        $this->indicators = $indicators;
        $this->validator = $validator;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /**
         * @psalm-var array{type:?string, length:?string} $data
         */
        $data = $request->getParsedBody();

        $command = new Command();
        $command->type = $data['type'] ?? '';
        /** @var int length */
        $command->length = $data['length'] ?? 0;

        $this->validator->validate($command);

        if (!$indicator_id = $this->handler->handle($command)) {
            return new JsonResponse([], 400);
        }

        return new JsonResponse([
            'id' => $indicator_id
        ], 201);
    }
}
