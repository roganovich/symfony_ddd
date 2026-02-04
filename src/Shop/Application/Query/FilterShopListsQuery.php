<?php

declare(strict_types=1);

namespace App\Shop\Application\Query;

use App\Shared\Application\Query\FilterQueryInterface;

class FilterShopListsQuery implements FilterQueryInterface
{
    public function __construct(
        public readonly ?string $search = null,
        public readonly ?string $page = null,
        public readonly ?string $limit = null,
    ) {
    }

    public function getSearch(): ?string
    {
        return $this->search;
    }

    public function getPage(): ?string
    {
        return $this->page ? $this->page : null;
    }

    public function getLimit(): ?string
    {
        return $this->limit ? $this->limit : null;
    }
}