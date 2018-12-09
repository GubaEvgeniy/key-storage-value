<?php

/*
 * This file is part of the "key-value-storage" package.
 *
 * (c) Evgeniy Guba <evgeniyguba@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
        $json = \json_encode($data, \JSON_PRETTY_PRINT);
        \file_put_contents($this->file, $json, \LOCK_EX);
    }
}
