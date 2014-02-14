[![Build Status](https://travis-ci.org/eddiejaoude/zf2-doctrine2-manager-registry-service.png)](https://travis-ci.org/eddiejaoude/zf2-doctrine2-manager-registry-service)
[![Coverage Status](https://coveralls.io/repos/eddiejaoude/zf2-doctrine2-manager-registry-service/badge.png?branch=master)](https://coveralls.io/r/eddiejaoude/zf2-doctrine2-manager-registry-service?branch=master)
[![Total Downloads](https://poser.pugx.org/eddiejaoude/zf2-doctrine2-manager-registry-service/downloads.png)](https://packagist.org/packages/eddiejaoude/zf2-doctrine2-manager-registry-service)

# zf2-doctrine2-Manager-registry-service

Creates &amp; Exposes Doctrine2 Register Service for Zend Framework 2 as a Module (ManagerRegistry)

---

## Installation via Composer

### Steps

#### 1. Add to composer.
```
    "require" : {
        "eddiejaoude/zf2-doctrine2-Manager-registry-service" : "0.*"
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
