<?php

namespace XaviCabot\Laravel\Holded;

use GuzzleHttp\Client;
use XaviCabot\Laravel\Holded\Contracts\HoldedInterface;
use XaviCabot\Laravel\Holded\Modules\DocumentModule;
use XaviCabot\Laravel\Holded\Modules\ContactModule;

class Holded implements HoldedInterface
{
    protected string $apiKey;
    protected string $baseUrl;
    protected Client $client;

    public function __construct(?Client $client = null)
    {
        $this->apiKey = config('holded.api_key');
        $this->baseUrl = rtrim(config('holded.base_url'), '/') . '/';
        $this->client = $client ?? new Client();
    }

    public function document(): DocumentModule
    {
        return new DocumentModule($this->client, $this->apiKey, $this->baseUrl);
    }

    public function contact(): ContactModule
    {
        return new ContactModule($this->client, $this->apiKey, $this->baseUrl);
    }
}
