<?php

declare(strict_types=1);

namespace App\Shared\Domain\Exception;

class DomainNotFoundException extends \DomainException
{
    public function __construct(
        string $message = 'Запись не найдена',
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}