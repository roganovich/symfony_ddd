<?php

declare(strict_types=1);

namespace App\Shared\Application\Query;

interface FilterQueryInterface
{
    public function getSearch(): ?string;

    public function getPage(): ?string;

    public function getLimit(): ?string;
}