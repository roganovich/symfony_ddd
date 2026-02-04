<?php

declare(strict_types=1);

namespace App\Shop\Domain\Entity;

use App\Shop\Domain\Value\ShopId;
use \DateTimeImmutable;

class Shop
{
    private ShopId $id;
    private string $name;
    private string $address;
    private DateTimeImmutable $createdAt;


    public function __construct(ShopId $id)
    {
        $this->id = $id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getId(): ShopId
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}