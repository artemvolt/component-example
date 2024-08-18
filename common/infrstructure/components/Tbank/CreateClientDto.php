<?php

declare(strict_types=1);

namespace common\infrastructure\components\Tbank;

use DateTimeImmutable;

readonly final class CreateClientDto
{
    public function __construct(
        public string $firstName,
        public string $lastName,
        public DateTimeImmutable $dob,
    ) {
    }
}