<?php

declare(strict_types=1);

namespace App\Shop\Domain\Repository;

use App\Shop\Domain\Entity\Shop;

interface ShopRepositoryInterface {
    public function findById(string $id): Shop;
    public function findAll(): array;
    public function create(Shop $shop): Shop;
}