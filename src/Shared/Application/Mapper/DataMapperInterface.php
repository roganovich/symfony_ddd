<?php

declare(strict_types=1);

namespace App\Shared\Application\Mapper;

use App\Shared\Application\Request\DataRequestInterface;
use App\Shared\Application\Response\DataResponseInterface;

interface DataMapperInterface
{
    public function toEntity(DataRequestInterface $request): object;

    public function toResponse(object $entity): DataResponseInterface;
}