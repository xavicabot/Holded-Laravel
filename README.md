# Laravel Holded Package

Cliente PHP para la API de Holded, diseñado para integrarse fácilmente con Laravel.

---

## 🚀 Instalación

```bash
composer require xavicabot/laravel-holded
```

---

## ⚙️ Configuración

Publica el archivo de configuración:

```bash
php artisan vendor:publish --tag=config --provider="LaravelHolded\HoldedServiceProvider"
```

Agrega en tu `.env`:

```env
HOLDED_API=your_api_key
HOLDED_API_URL=https://api.holded.com/api/invoicing/v1/
```

---

## ✅ Uso

```php
use LaravelHolded\Holded;

$holded = app(Holded::class);

$contacts = $holded->listContacts();
$contact = $holded->getContact('contactId');
$newContact = $holded->createContact(['name' => 'Cliente nuevo']);
```

---

## 🧪 Tests

Instala dependencias de desarrollo:

```bash
composer install
```

Lanza los tests:

```bash
composer test
```

---

## 📂 Estructura del paquete

- `src/` → Código fuente principal
- `config/` → Archivo de configuración Laravel
- `tests/` → Pruebas con Pest
- `composer.json` → Autoload, dependencias, provider

---

## ✍️ Créditos

Creado por [Xavi Cabot](https://tusitio.com)

---

## 📄 Licencia

MIT ©
