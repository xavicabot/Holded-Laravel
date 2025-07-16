<?php

namespace XaviCabot\Laravel\Holded\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array listContacts(int $page = 1)
 * @method static array getContact(string $id)
 * @method static array createContact(array $data)
 * @method static array updateContact(string $id, array $data)
 * @method static array createDocument(string $type, array $data)
 */

class Holded extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'holded';
    }
}