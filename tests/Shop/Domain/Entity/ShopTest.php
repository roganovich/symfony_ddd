<?php

declare(strict_types=1);

namespace App\Tests\Shop\Domain\Entity;

use App\Shop\Domain\Entity\Shop;
use App\Shop\Domain\Value\ShopId;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;

class ShopTest extends TestCase
{
    public function testShopCreation(): void
    {
        $shopId = new ShopId(Uuid::v1()->toString());
        $shop = new Shop($shopId);

        $this->assertInstanceOf(Shop::class, $shop);
        $this->assertEquals($shopId, $shop->getId());
    }

    public function testSetName(): void
    {
        $shopId = new ShopId(Uuid::v1()->toString());
        $shop = new Shop($shopId);
        $shop->setName('Test Shop');

        $this->assertEquals('Test Shop', $shop->getName());
    }

    public function testSetAddress(): void
    {
        $shopId = new ShopId(Uuid::v1()->toString());
        $shop = new Shop($shopId);
        $shop->setAddress('123 Test Street');

        $this->assertEquals('123 Test Street', $shop->getAddress());
    }
}