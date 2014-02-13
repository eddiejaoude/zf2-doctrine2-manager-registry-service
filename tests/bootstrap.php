<?php
namespace EddieJaoude\Zf2Doctrine2ManagerRegistryService\Tests;

$vendorDir = __DIR__ . '/../vendor';

if (file_exists($file = $vendorDir . '/autoload.php')) {
    require_once $file;
} else if (file_exists($file = './vendor/autoload.php')) {
    require_once $file;
} else {
    throw new \RuntimeException("Not found composer autoload");
}