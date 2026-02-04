<?php

declare(strict_types=1);

namespace App\Shop\Domain\Service;

use App\Shop\Domain\Entity\Shop;

interface ShopServiceInterface
{
    public function findById(string $id): Shop;
    public function findAll(): array;
    public function create(Shop $create): Shop;
}