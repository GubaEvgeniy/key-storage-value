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

use Symfony\Component\Yaml\Yaml;

class YamlKeyValuesStore extends AbstractFileKeyValueStore
{

    /**
     * {@inheritdoc}
     */
    protected function load(): array
    {
        $data = Yaml::parseFile($this->file);

        return \is_array($data) ? $data : [];
    }

    /**
     * {@inheritdoc}
     */
    protected function update(array $data): void
    {
        $yaml = Yaml::dump($data);
        \file_put_contents($this->file, $yaml, \LOCK_EX);
    }
}
