
<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/../vendor/autoload.php';


use App\Store\InMemoryKeyValueStore;
use App\Store\JsonKeyValuesStore;
use App\Store\YamlKeyValuesStore;

echo \sprintf("Value Store in Memory<br>");

$storageMemory = new InMemoryKeyValueStore();
$storageMemory->set('timeMemory', date('H-i-s'));
echo \sprintf("Example: use method get. Result: key = %s value = %s \n", $storageMemory->get('timeMemory'), 'timeMemory');


echo \sprintf("<br>-----<br>Value Store in Yaml<br>");
$storageYaml = new YamlKeyValuesStore('../data/key-value-store.yaml');
$storageYaml->set('timeYaml', date('H-i-s'));
$storageYaml->get('time');

var_dump($storageYaml->get('time'));

echo \sprintf("Example: use method get. Result: key = %s value = %s \n", $storageYaml->get('timeYaml'), 'timeYaml');

echo \sprintf("<br>-----<br>Value Store in Json<br>");
$storageJson = new JsonKeyValuesStore('../data/key-value-store.json');
