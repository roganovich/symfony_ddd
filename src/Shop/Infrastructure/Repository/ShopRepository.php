<?php

declare(strict_types=1);

namespace App\Shop\Infrastructure\Repository;

use App\Shop\Domain\Entity\Shop;
use App\Shop\Domain\Repository\ShopRepositoryInterface;
use App\Shop\Presentation\Mapper\ShopMapperInterface;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;

#[AsAlias(ShopRepositoryInterface::class)]
class ShopRepository implements ShopRepositoryInterface
{
    const ITEMS = [
        [
            'id' => 'bb2bdcc6-01b8-11f1-bb14-8d62edd78074',
            'name' => 'Магазин электроники "ТехноМаркет"',
            'address' => 'ул. Ленина, 123, Москва',
            'createdAt' => '2023-01-15 10:30:00',
        ],
        [
            'id' => 'c17d00be-01b8-11f1-a301-8526fc3b568f',
            'name' => 'Книжный магазин "ЧитайГород"',
            'address' => 'пр. Мира, 45, Санкт-Петербург',
            'createdAt' => '2022-05-20 14:15:00',
        ],
        [
            'id' => 'c5859d24-01b8-11f1-8f0a-f9f4a42a6345',
            'name' => 'Спортивный магазин "СпортЛенд"',
            'address' => 'ул. Спортивная, 8, Екатеринбург',
            'createdAt' => '2023-11-03 09:45:00',
        ],
        [
            'id' => 'c94c95b6-01b8-11f1-b493-47d47167c78d',
            'name' => 'Магазин одежды "МодаСтиль"',
            'address' => 'пл. Кирова, 7, Новосибирск',
            'createdAt' => '2024-01-22 16:20:00',
        ],
        [
            'id' => 'cd55e6e4-01b8-11f1-8cb0-05bc40816ac3',
            'name' => 'Продуктовый магазин "ВкусВилл"',
            'address' => 'пер. Гоголя, 21, Казань',
            'createdAt' => '2023-08-10 12:00:00',
        ],
    ];

    public function __construct(
        private readonly ShopMapperInterface $shopMapper,
    ) {
    }

    public function findById(string $id): Shop
    {
        $row = array_filter(self::ITEMS, fn ($item) => $item['id'] === $id);

        return $this->shopMapper->toDomain(array_pop($row));
    }

    public function findAll(): array
    {
        $shops = [];
        foreach (self::ITEMS as $row) {
            $shops[] = $this->shopMapper->toDomain($row);
        }
        return $shops;
    }
}