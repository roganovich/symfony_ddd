<?php

declare(strict_types=1);

namespace App\Shared\Application\Dto;

class PaginatedResponse
{
    public function __construct(
        public readonly array $items,
        public readonly int $total,
        public readonly int $page,
        public readonly int $limit
    ) {
    }
}