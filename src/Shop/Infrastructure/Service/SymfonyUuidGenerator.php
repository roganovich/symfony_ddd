<?php

declare(strict_types=1);

namespace App\Shop\Infrastructure\Service;

use App\Shop\Domain\Service\UuidGeneratorInterface;
use Symfony\Component\Uid\Uuid;

class SymfonyUuidGenerator implements UuidGeneratorInterface
{
    public function generate(): string
    {
        return Uuid::v1()->toString();
    }
}