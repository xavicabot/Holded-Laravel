<?php

namespace XaviCabot\Laravel\Holded\Modules;

use GuzzleHttp\Client;

class ContactModule
{
    public function __construct(
        protected Client $client,
        protected string $apiKey,
        protected string $baseUrl
    ) {}

    public function list(int $page = 1): array
    {
        return $this->request('GET', "contacts?page={$page}");
    }

    public function get(string $id): array
    {
        return $this->request('GET', "contacts/{$id}");
    }

    public function create(array $contact): array
    {
        return $this->request('POST', 'contacts', $contact);
    }

    public function update(string $id, array $data): array
    {
        return $this->request('PUT', "contacts/{$id}", $data);
    }

    public function delete(string $id): array
    {
        return $this->request('DELETE', "contacts/{$id}");
    }

    protected function request(string $method, string $endpoint, array $data = []): array
    {
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'key' => $this->apiKey,
            ],
        ];

        if (!empty($data) && in_array($method, ['POST', 'PUT'])) {
            $options['json'] = $data;
        }

        $response = $this->client->request($method, $this->baseUrl . $endpoint, $options);

        return json_decode($response->getBody()->getContents(), true);
    }
}
