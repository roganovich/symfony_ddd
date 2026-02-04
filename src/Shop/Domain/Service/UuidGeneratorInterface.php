<?php

declare(strict_types=1);

namespace App\Shop\Domain\Service;

interface UuidGeneratorInterface
{
    public function generate(): string;
}