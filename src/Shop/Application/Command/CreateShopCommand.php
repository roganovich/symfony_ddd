<?php

declare(strict_types=1);

namespace App\Shop\Application\Command;

class CreateShopCommand
{
    public function __construct(
        public readonly string $name,
        public readonly string $address
    ) {
    }
}