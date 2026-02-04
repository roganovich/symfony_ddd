<?php

declare(strict_types=1);

namespace App\Shop\Application\Handler;

use App\Shop\Domain\Entity\Shop;
use App\Shop\Domain\Value\ShopId;
use App\Shop\Domain\Service\ShopServiceInterface;
use App\Shop\Domain\Service\UuidGeneratorInterface;
use App\Shop\Application\Command\CreateShopCommand;

class CreateShopHandler
{
    public function __construct(
        private ShopServiceInterface $service,
        private UuidGeneratorInterface $uuidGenerator
    ) {
    }

    public function execute(CreateShopCommand $command): Shop
    {
        $shopId = new ShopId($this->uuidGenerator->generate());
        $shop = new Shop($shopId);
        $shop->setName($command->name);
        $shop->setAddress($command->address);
        $shop->setCreatedAt(new \DateTimeImmutable());

        $shop = $this->service->create($shop);

        return $shop;
    }
}