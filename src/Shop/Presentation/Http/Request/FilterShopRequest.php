<?php

declare(strict_types=1);

namespace App\Shop\Presentation\Http\Request;
use Symfony\Component\Validator\Constraints as Assert;

class FilterShopRequest
{
    #[Assert\Length(min: 2, max: 100)]
    public ?string $search = null;

    public ?string $page = null;

    public ?string $limit = null;
}