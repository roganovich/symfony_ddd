<?php

declare(strict_types=1);

namespace App\Shop\Application\Query;

use App\Shop\Domain\Repository\ShopRepositoryInterface;
use App\Shop\Application\Dto\ShopListDto;
use App\Shared\Application\Dto\PaginatedResponse;
use App\Shared\Application\Query\QueryHandlerInterface;
use App\Shared\Application\Query\FilterQueryInterface;

class FilterShopListsQueryHandler implements QueryHandlerInterface
{
    public function __construct(
        private ShopRepositoryInterface $shopRepository
    ) {
    }

    public function execute(FilterQueryInterface $query): PaginatedResponse
    {
        // Используем репозиторий для получения данных
        $items = $this->shopRepository->findWithPagination(
            $query
        );

        return new PaginatedResponse(
            items: $items,
            total: count($items),
            page: (int) $query->getPage(),
            limit: (int) $query->getLimit(),
        );
    }
}