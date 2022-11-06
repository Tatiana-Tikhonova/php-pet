<?php

namespace App;

use App\Db;

/**
 * Model - abstract parent class for other classes
 */
abstract class Model
{
    const TABLE = '';
    public $id;

    /**
     * getAll
     *
     * @return array
     */
    public static function getAll(): array
    {
        $db = new Db();
        return $db->getData(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    public static function getById(int $id): array
    {
        $db = Db::unique();
        return $db->getData(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=' . $id,
            static::class
        );
    }

    /**
     * isNew
     *
     * @return bool
     */
    public function isNew(): bool
    {
        return empty($this->id);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insertData(): void
    {
        if (!$this->isNew()) {
            return;
        }
        $props = [];
        $values = [];
        foreach ($this as $key => $val) {
            if ('id' == $key) {
                continue;
            }
            $props[] = $key;
            $values[':' . $key] = $val;
        }

        $sql = '
        INSERT INTO ' . static::TABLE . '
        (' . \implode(',', $props) . ')
        VALUES (' . implode(',', \array_keys($values)) . ')
        ';
        $db = Db::unique();
        $db->execute($sql, $values);
    }
}
