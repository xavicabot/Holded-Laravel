# Holded API Laravel Package

Cliente PHP para la API de Holded, diseñado para integrarse fácilmente con Laravel.

---

## 🚀 Instalación

```bash
composer require xavicabot/Holded-Laravel
```

---

## ⚙️ Configuración

Publica el archivo de configuración:

```bash
php artisan vendor:publish --tag=config --provider="HoldedApi\HoldedServiceProvider"
```

Agrega en tu `.env`:

```env
HOLDED_API=your_api_key
HOLDED_API_URL=https://api.holded.com/api/invoicing/v1/
```

---

## ✅ Uso

```php
use HoldedApi\Holded;

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

Creado por [Tu Nombre o Empresa](https://tusitio.com)

---

## 📄 Licencia

MIT ©
