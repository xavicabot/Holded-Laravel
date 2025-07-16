<?php

namespace XaviCabot\Laravel\Holded\Modules;

use GuzzleHttp\Client;
use XaviCabot\Laravel\Holded\DTOs\DocumentData;
use XaviCabot\Laravel\Holded\Enums\DocumentType;

class DocumentModule
{
    public function __construct(
        protected Client $client,
        protected string $apiKey,
        protected string $baseUrl
    ) {}

    public function list(int $page = 1, string $docType = DocumentType::INVOICE): array
    {
        return $this->request('GET', "documents/{$docType}?page={$page}");
    }

    public function create(DocumentData|array $data, string $docType = DocumentType::INVOICE): array
    {
        return $this->request('POST', "documents/{$docType}", $data);
    }

    public function get(string $id, string $docType = DocumentType::INVOICE): array
    {
        return $this->request('GET', "documents/{$docType}/{$id}");
    }

    public function delete(string $id, string $docType = DocumentType::INVOICE): array
    {
        return $this->request('DELETE', "documents/{$docType}/{$id}");
    }

    protected function request(string $method, string $endpoint, DocumentData|array $data = []): array
    {
        $this->validateFromEndpoint($endpoint);

        if ($data instanceof DocumentData) {
            $data = $data->toArray();
        }

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

    protected function validateFromEndpoint(string $endpoint): void
    {
        preg_match('/documents\\/([a-z]+)/', $endpoint, $matches);
        $type = $matches[1] ?? null;

        if ($type && !\XaviCabot\Laravel\Holded\Enums\DocumentType::isValid($type)) {
            throw new \InvalidArgumentException("Invalid document type: {$type}");
        }
    }
}
