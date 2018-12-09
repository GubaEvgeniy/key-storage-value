Key Value Store
===============

[![Key Value Store](https://img.shields.io/badge/PHP%20Advanced-ITEA-red.svg)](#key-value-store)

This is simple implementation of Key-Value Store. Library provides implementation of
in memory storage, Json file store and Yaml file store.

Usage
-----

1. Create storage instance

```php
$store = new \App\Store\InMemoryKeyValueStore();
```

2. Manipulate with data

```php
$store->set('db_name', 'app_prod');

$databaseName = $store->get('db_name') ?? 'app_dev';

if ($store->has('db_name')) {
    $store->remove('db_name');
}

$store->clear();
```

Example
-----

`$ ./bin/tests console`

or

`your.site/bin/test.php`