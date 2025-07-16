<?php

namespace XaviCabot\Laravel\Holded\Modules;

use GuzzleHttp\Client;
use XaviCabot\Laravel\Holded\DTOs\DocumentData;

class DocumentModule
{
    public function __construct(
        protected Client $client,
        protected string $apiKey,
        protected string $baseUrl
    ) {}

    public function create(DocumentData|array $data, string $docType = 'invoice'): array
    {
        return $this->request('POST', "documents/{$docType}", $data);
    }

    public function get(string $id, string $docType = 'invoice'): array
    {
        return $this->request('GET', "documents/{$docType}/{$id}");
    }

    public function delete(string $id, string $docType = 'invoice'): array
    {
        return $this->request('DELETE', "documents/{$docType}/{$id}");
    }

    protected function request(string $method, string $endpoint, DocumentData|array $data = []): array
    {
        if ($data instanceof DocumentData) {
            $data = $data->toArray();
        }

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
