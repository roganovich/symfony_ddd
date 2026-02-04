<?php

declare(strict_types=1);

namespace App\Shop\Presentation\Response;

use App\Shop\Domain\Entity\Shop;

interface ResponseInterface
{
    public static function format(Shop $shop): self;
    public static function formatList(array $shops): array;
    public function toArray(): array;
}