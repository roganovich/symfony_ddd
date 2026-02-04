<?php

declare(strict_types=1);

namespace App\Tests\Shop\Application;

use App\Shop\Application\Command\CreateShopCommand;
use App\Shop\Application\Handler\CreateShopHandler;
use App\Shop\Domain\Entity\Shop;
use App\Shop\Domain\Service\ShopServiceInterface;
use App\Shop\Domain\Service\UuidGeneratorInterface;
use App\Shop\Presentation\Http\Request\CreateShopRequest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;

class CreateShopCommandTest extends TestCase
{
    public function testShopCreation(): void
    {
        $request = new CreateShopRequest();
        $request->name = 'Test Shop';
        $request->address = 'Test Address';

        $command = new CreateShopCommand(
            $request->name,
            $request->address,
        );

        // Создаем моки для зависимостей
        $uuidGenerator = $this->createMock(UuidGeneratorInterface::class);
        $uuidGenerator->method('generate')->willReturn(Uuid::v1()->toString());

        $shopService = $this->createMock(ShopServiceInterface::class);
        $shopService->method('create')->willReturnCallback(function (Shop $shop) {
            return $shop;
        });

        // Создаем обработчик с моками
        $handler = new CreateShopHandler($shopService, $uuidGenerator);

        // Выполняем команду
        $shop = $handler->execute($command);

        // Проверяем результат
        $this->assertInstanceOf(Shop::class, $shop);
        $this->assertEquals('Test Shop', $shop->getName());
        $this->assertEquals('Test Address', $shop->getAddress());
    }
}