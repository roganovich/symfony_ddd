<?php

declare(strict_types=1);

namespace App\Shop\Application\Service;

use App\Shop\Domain\Entity\Shop;
use App\Shop\Domain\Repository\ShopRepositoryInterface;
use App\Shop\Domain\Service\ShopServiceInterface;

class ShopService implements ShopServiceInterface
{
    public function __construct(
        private readonly ShopRepositoryInterface $shopRepository,
    ) {
    }

    public function findById(string $id): Shop
    {
        return $this->shopRepository->findById($id);
    }

    public function findAll(): array
    {
        return $this->shopRepository->findAll();
    }

    public function create(Shop $shop): Shop
    {
        return $this->shopRepository->create($shop);
    }
}