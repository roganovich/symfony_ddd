<?php

declare(strict_types=1);

namespace App\Shop\Presentation\Response;

use App\Shop\Domain\Entity\Shop;
use JsonSerializable;

class ShopResponse implements ResponseInterface, JsonSerializable
{
    public function __construct(
        private ?Shop $shop,
    ) {
    }

    public static function format(Shop $shop): self
    {
        return new self($shop);
    }

    public static function formatList(array $shops): array
    {
        return array_map(fn(Shop $shop) => self::format($shop), $shops);
    }

    public function getId(): string
    {
        return strval($this->shop->getId());
    }

    public function getName(): string
    {
        return $this->shop->getName();
    }

    public function getAddress(): string
    {
        return $this->shop->getAddress();
    }

    public function getDate(): string
    {
        return $this->shop->getCreatedAt()->format('d.m.Y');
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'address' => $this->getAddress(),
            'date' => $this->getDate(),
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}