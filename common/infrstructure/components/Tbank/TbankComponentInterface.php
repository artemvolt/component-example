<?php

declare(strict_types=1);

namespace common\infrastructure\components\Tbank;

interface TbankComponentInterface
{
    public function createClient(CreateClientDto $createClientDto): void;
}