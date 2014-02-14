# zf2-doctrine2-Manager-registry-service

Creates &amp; Exposes Doctrine2 Register Service for Zend Framework 2 as a Module (ManagerRegistry)

---

## Installation via Composer

### Steps

#### 1. Add to composer.
```
    "require" : {
        "eddiejaoude/zf2-doctrine2-Manager-registry-service" : "0.4"
    }
```

#### 2. Add module to application config (/config/application.config.php)
```
   ...
   'modules' => array(
        'EddieJaoude\Zf2Doctrine2ManagerRegistryService',
   ),
   ...
```

Then you are good to go. All requests & responses will be logged.

---

## Example Usage

On the service manager, get the ManagerRegistry

```
$serviceManager->get('Doctrine\ManagerRegistry');
```

---

## Unit tests

To run unit tests from the root of the project

```
vendor/bin/phpunit -c tests/phpunit.xml
```

---
