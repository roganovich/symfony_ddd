<?php

declare(strict_types=1);

namespace App\Shop\Presentation\Mapper;

use App\Shop\Domain\Entity\Shop;

interface ShopMapperInterface
{
    public function toDomain(array $row): Shop;
}