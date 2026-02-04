<?php

declare(strict_types=1);

namespace App\Shared\Application\Query;

use App\Shared\Application\Query\FilterQueryInterface;
use App\Shared\Application\Dto\PaginatedResponse;

interface QueryHandlerInterface
{
    public function execute(FilterQueryInterface $query): PaginatedResponse;
}