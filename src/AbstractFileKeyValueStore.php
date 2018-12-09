<?php
/**
 * Created by PhpStorm.
 * User: whoisthere
 * Date: 09.12.18
 * Time: 11:42
 */

namespace App\Store;


use App\Store\Exception\InvalidConfigException;
use http\Exception\InvalidArgumentException;

abstract class AbstractFileKeyValueStore implements KeyValueStoreInterface
{

    /**
     * Full path to the file
     *
     * @var string
     */

    protected $file;

    /**
     * Load data and convert data to array
     *
     * @return array
     */
    abstract protected function load(): array;

    /**
     * Update data
     *
     * @param array $data
     * @return mixed
     */
    abstract protected function update(array $data): void;

    /**
     * AbstractFileKeyValueStore constructor.
     * Get $pathToFile and validate it
     *
     * @param string $pathToFile
     */
    public function __construct(string $pathToFile)
    {
        if(empty($pathToFile)){
            throw new InvalidConfigException('You should specify path to file');
        }

        if('/' === \substr($pathToFile, -1, 1)){
            throw new InvalidConfigException('You should specify path to file, path to directory given');
        }

        if(!\file_exists($pathToFile)) {
            throw new InvalidConfigException('File does not exist, you should create it');
        }

        $this->file = $pathToFile;
    }

    /**
     * Stores value by key.
     *
     * @param string $key Name of the key.
     * @param mixed $value Value to store.
     */
    public function set(string $key, $value): void
    {
        $data = $this->load();
        $data[$key] = \is_object($value) ? \serialize($value) : $value;
        $this->update($data);
    }

    /**
     * Gets value by key.
     *
     * @param string $key Name of the key.
     * @param null|mixed $default Default value.
     *
     * @return mixed Can be of any type: int, string, null, array, e.g.
     * If value does not exist for provided key, $default will be returned.
     */
    public function get($key, $default = null)
    {
        // TODO: Implement get() method.
    }

    /**
     * Checks whether value is exist by key.
     *
     * @param string $key Name of key.
     *
     * @return bool Returns true if key exists, false otherwise.
     */
    public function has(string $key): bool
    {
        // TODO: Implement has() method.
    }

    /**
     * Removes value by key.
     *
     * @param string $key Name of key.
     */
    public function remove(string $key): void
    {
        // TODO: Implement remove() method.
    }

    /**
     * Removes all keys and their values from the storage.
     */
    public function clear(): void
    {
        // TODO: Implement clear() method.
    }


}