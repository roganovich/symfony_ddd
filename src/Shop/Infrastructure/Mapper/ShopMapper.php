<?php

declare(strict_types=1);

namespace App\Shop\Infrastructure\Mapper;

use App\Shop\Domain\Entity\Shop;
use App\Shop\Domain\Value\ShopId;
use App\Shop\Presentation\Mapper\ShopMapperInterface;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use \DateTimeImmutable;

#[AsAlias(ShopMapperInterface::class)]
class ShopMapper implements ShopMapperInterface
{
    public function toDomain(array $row): Shop
    {
        $shopId = new ShopId($row['id']);
        $shop = new Shop($shopId);
        $shop->setName($row['name']);
        $shop->setAddress($row['address']);
        $shop->setCreatedAt(new DateTimeImmutable($row['createdAt']));
        
        return $shop;
    }
}