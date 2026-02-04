<?php

declare(strict_types=1);

namespace App\Shop\Application\Mapper;

use App\Shop\Application\Command\CreateShopCommand;
use App\Shop\Presentation\Http\Request\CreateShopRequest;

interface CreateShopMapperInterface
{
    public function toCommand(CreateShopRequest $request): CreateShopCommand;
}