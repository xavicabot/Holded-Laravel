<?php

namespace src\Contracts;

interface HoldedInterface
{
    public function listContacts(int $page = 1): array;
    public function getContact(string $id): array;
    public function createContact(array $contact): array;
    public function updateContact(string $id, array $data): array;
    public function createDocument(string $type, array $data): array;
}