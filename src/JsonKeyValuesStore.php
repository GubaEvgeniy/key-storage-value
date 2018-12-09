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
        $data = \file_get_contents($this->file);
        return \is_array($data) ? $data : [];
    }

    /**
     * {@inheritdoc}
     */
    protected function update(array $data): void
    {

    }
}