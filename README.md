# zf2-doctrine2-Manager-registry-service

Creates &amp; Exposes Doctrine2 Register Service (ManagerRegistry)

---

## Installation via Composer

### Steps

#### 1. Add to composer.
```
    "require" : {
        "eddiejaoude/zf2-doctrine2-Manager-registry-service" : ">0.1"
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

```
$serviceManager->get('Doctrine\ManagerRegistry');
```

---
