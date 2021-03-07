<?php

declare(strict_types=1);

namespace App\Indicators\Command\Generate;

use Symfony\Component\Validator\Constraints as Assert;

class Command
{
    /**
     * @Assert\NotBlank()
     */
    public string $type = '';

    /**
     * @Assert\NotBlank()
     */
    public ?int $length = null;
}
