<?php

declare(strict_types=1);

namespace common\infrastructure\components\Tbank;

use DateTime;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Log\LoggerInterface;

final class TbankComponent implements TbankComponentInterface
{
    public function __construct(
        private readonly ClientInterface $client,
        private readonly RequestFactoryInterface $requestFactory,
        private readonly StreamFactoryInterface $streamFactory,
        private readonly LoggerInterface $logger,
    ) {
    }

    public function createClient(CreateClientDto $createClientDto): void
    {
        $request = $this->requestFactory->createRequest(
            'POST',
            '/path/to/method'
        )->withBody(
            $this->streamFactory->createStream(
                json_encode([
                    'first_name' => $createClientDto->firstName,
                    'last_name' => $createClientDto->lastName,
                    'dob' => $createClientDto->dob->format(DateTime::RFC822)
                ])
            )
        );

        try {
            $this->client->sendRequest($request);
            $this->logger->info("TbankComponent. Request {$request->getUri()} with body {$request->getBody()} sent successfully");
        } catch (ClientExceptionInterface $e) {
            $this->logger->error("TbankComponent. Request {$request->getUri()} with body {$request->getBody()}. Error: {$e->getMessage()} ");
        }
    }
}