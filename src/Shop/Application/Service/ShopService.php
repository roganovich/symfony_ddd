<?php

declare(strict_types=1);

namespace App\Shop\Application\Service;

use App\Shop\Domain\Entity\Shop;
use App\Shop\Domain\Repository\ShopRepositoryInterface;
use App\Shop\Domain\Service\ShopServiceInterface;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;

#[AsAlias(ShopServiceInterface::class)]
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
}