<?php
/**
 * Created by PhpStorm.
 * User: whoisthere
 * Date: 09.12.18
 * Time: 13:41
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