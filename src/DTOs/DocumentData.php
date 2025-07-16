<?php

namespace XaviCabot\Laravel\Holded\DTOs;

use Illuminate\Support\Str;
use InvalidArgumentException;

class DocumentData
{
    public function __construct(
        public int|string|\DateTimeInterface $date,
        public ?string $contactCode = null,
        public ?string $contactId = null,
        public ?string $contactName = null,
        public ?string $contactEmail = null,
        public ?string $contactAddress = null,
        public ?string $contactCity = null,
        public ?string $contactCp = null,
        public ?string $contactProvince = null,
        public ?string $contactCountryCode = null,
        public ?string $desc = null,
        public ?string $notes = null,
        public ?string $salesChannelId = null,
        public ?string $paymentMethodId = null,
        public ?string $designId = null,
        public ?string $language = null,
        public ?string $warehouseId = null,
        public bool $approveDoc = false,
        public bool $applyContactDefaults = true,
        public array $items = [],
        public ?array $customFields = [],
        public ?string $invoiceNum = null,
        public ?string $numSerieId = null,
        public string $currency = 'EUR',
        public ?float $currencyChange = null,
        public array $tags = [],
        public ?int $dueDate = null,
        public ?string $shippingAddress = null,
        public ?string $shippingPostalCode = null,
        public ?string $shippingCity = null,
        public ?string $shippingProvince = null,
        public ?string $shippingCountry = null,
        public ?string $salesChannel = null,
    ) {}

    public function toArray(): array
    {
        $this->validate();

        return array_filter([
            'contactCode'        => $this->clean($this->contactCode),
            'contactId'          => $this->contactId,
            'contactName'        => $this->normalize($this->contactName),
            'contactEmail'       => strtolower(trim((string) $this->contactEmail)),
            'contactAddress'     => $this->normalize($this->contactAddress),
            'contactCity'        => $this->normalize($this->contactCity),
            'contactCp'          => $this->contactCp,
            'contactProvince'    => $this->normalize($this->contactProvince),
            'contactCountryCode' => strtoupper((string) $this->contactCountryCode),
            'desc'               => $this->desc,
            'date'               => $this->convertDate($this->date),
            'notes'              => $this->notes,
            'salesChannelId'     => $this->salesChannelId,
            'paymentMethodId'    => $this->paymentMethodId,
            'designId'           => $this->designId,
            'language'           => $this->language,
            'warehouseId'        => $this->warehouseId,
            'approveDoc'         => $this->approveDoc,
            'applyContactDefaults' => $this->applyContactDefaults,
            'items'              => $this->items,
            'customFields'       => $this->customFields,
            'invoiceNum'         => $this->invoiceNum,
            'numSerieId'         => $this->numSerieId,
            'currency'           => strtoupper($this->currency),
            'currencyChange'     => $this->currencyChange,
            'tags'               => $this->tags,
            'dueDate'            => $this->dueDate,
            'shippingAddress'    => $this->shippingAddress,
            'shippingPostalCode' => $this->shippingPostalCode,
            'shippingCity'       => $this->shippingCity,
            'shippingProvince'   => $this->shippingProvince,
            'shippingCountry'    => $this->shippingCountry,
            'salesChannel'       => $this->salesChannel,
        ], fn ($value) => $value !== null);
    }

    protected function validate(): void
    {
        if (!$this->contactCode && !$this->contactId && !$this->contactName) {
            throw new InvalidArgumentException('You must provide either contactCode, contactId or contactName.');
        }

        if (empty($this->date)) {
            throw new InvalidArgumentException('The "date" field is required.');
        }

        if (empty($this->items) || !is_array($this->items)) {
            throw new InvalidArgumentException('At least one item is required.');
        }
    }

    protected function normalize(?string $value): ?string
    {
        return $value ? strtoupper(Str::ascii(trim($value))) : null;
    }

    protected function clean(?string $value): ?string
    {
        return $value ? trim($value) : null;
    }

    protected function convertDate(int|string|\DateTimeInterface $value): int
    {
        if ($value instanceof \DateTimeInterface) {
            return $value->getTimestamp();
        }

        if (is_numeric($value)) {
            return (int) $value;
        }

        return strtotime((string) $value);
    }
}
