<?php

declare(strict_types=1);

namespace common\infrastructure\components\Tbank;

use Psr\Log\LoggerInterface;

final class TbankDummyComponent implements TbankComponentInterface
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {
    }

    public function createClient(CreateClientDto $createClientDto): void
    {
        $this->logger->info("
            Try to send dummy request to Tbank.
            Request: 
                firstName: {$createClientDto->firstName},
                lastName: {$createClientDto->lastName},
                dob: {$createClientDto->dob->format('Y-m-d')},
        ");
    }
}