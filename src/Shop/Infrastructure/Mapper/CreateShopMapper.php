<?php

declare(strict_types=1);

namespace App\Shop\Infrastructure\Mapper;

use App\Shop\Application\Mapper\CreateShopMapperInterface;
use App\Shop\Application\Command\CreateShopCommand;
use App\Shop\Presentation\Http\Request\CreateShopRequest;

class CreateShopMapper implements CreateShopMapperInterface
{
    public function toCommand(CreateShopRequest $request): CreateShopCommand
    {
        return new CreateShopCommand(
            $request->name,
            $request->address,
        );
    }
}