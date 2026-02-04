<?php

declare(strict_types=1);

namespace App\Shop\Presentation\Http\Request;
use Symfony\Component\Validator\Constraints as Assert;

class CreateShopRequest
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 100)]
    public string $name;
    
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 255)]
    public string $address;
}