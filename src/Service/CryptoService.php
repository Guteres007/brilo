<?php

namespace App\Service;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Dto\Crypto\BitcoinPriceDto;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class CryptoService
{
    private Serializer $serializer;
    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly LoggerInterface $logger,
        private readonly string $apiUrl
    ) {
        $this->serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
    }

    public function downloadCrypto(): BitcoinPriceDto
    {
        $response = $this->client->request('GET', $this->apiUrl . '/bpi/currentprice.json');
        $content = $response->getContent();
        try {
            return $this->serializer->deserialize($content, BitcoinPriceDto::class, 'json');
        } catch (\Exception $e) {
            $this->logger->error('Error while deserializing the response' . $e->getMessage());
            throw new \Exception('Error while deserializing the response' . $e->getMessage());
        }
    }
}
