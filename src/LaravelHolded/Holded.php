<?php

namespace LaravelHolded;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use HoldedApi\Contracts\HoldedInterface;

class Holded implements HoldedInterface
{
    protected string $apiKey;
    protected string $baseUrl;
    protected Client $client;

    public function __construct(?Client $client = null)
    {
        $this->apiKey = config('holded.key');
        $this->baseUrl = rtrim(config('holded.base_url'), '/') . '/';
        $this->client = $client ?? new Client();
    }

    public function listContacts(int $page = 1): array
    {
        return $this->request('GET', "contacts?page={$page}");
    }

    public function getContact(string $id): array
    {
        return $this->request('GET', "contacts/{$id}");
    }

    public function createContact(array $contact): array
    {
        return $this->request('POST', 'contacts', $contact);
    }

    public function updateContact(string $id, array $data): array
    {
        return $this->request('PUT', "contacts/{$id}", $data);
    }

    public function createDocument(string $type, array $data): array
    {
        return $this->request('POST', "documents/{$type}", $data);
    }

    protected function request(string $method, string $endpoint, array $body = []): array
    {
        try {
            $options = [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'key' => $this->apiKey,
                ],
            ];

            if (!empty($body)) {
                $options['json'] = $body;
            }

            $response = $this->client->request($method, $this->baseUrl . $endpoint, $options);

            return json_decode($response->getBody()->getContents(), true) ?? [];
        } catch (GuzzleException $e) {
            report($e);
            return ['error' => $e->getMessage()];
        }
    }
}