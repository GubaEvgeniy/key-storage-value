<?php
/**
 * Created by PhpStorm.
 * User: whoisthere
 * Date: 09.12.18
 * Time: 14:43
 */

namespace App\Store;


class JsonKeyValuesStore extends AbstractFileKeyValueStore
{
    /**
     * {@inheritdoc}
     */
    protected function load(): array
    {
        $json = \file_get_contents($this->file);
        $data = \json_decode($json, true);

        return \is_array($data) ? $data : [];
    }

    /**
     * {@inheritdoc}
     */
    protected function update(array $data): void
    {
        $json = json_encode($data, \JSON_PRETTY_PRINT);
        \file_put_contents($this->file, $json, \LOCK_EX);
    }
}