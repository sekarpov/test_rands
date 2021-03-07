<?php

declare(strict_types=1);

namespace App\Http\Action\Indicator;

use App\Http\JsonResponse;
use App\Indicators\Entity\Indicator\Id;
use App\Indicators\Entity\Indicator\Indicator;
use App\Indicators\Entity\Indicator\IndicatorRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ShowAction implements RequestHandlerInterface
{
    private $indicators;

    public function __construct(IndicatorRepository $indicators)
    {
        $this->indicators = $indicators;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /** @var string $indicator_id */
        $indicator_id = $request->getAttribute('id');

        if (!$indicator = $this->indicators->get(new Id($indicator_id))) {
            return new JsonResponse([], 404);
        }

        return new JsonResponse($this->serialize($indicator), 200);
    }

    private function serialize(Indicator $indicator): array
    {
        return [
            'value' => $indicator->getValue()
        ];
    }
}
