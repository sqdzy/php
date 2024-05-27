<?php

namespace src\Models;

use Services\Db;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }
    public function __set($name, $value)
    {
        $property = $this->underscoreToCamelcase($name);
        $this->$property = $value;
    }
    private function underscoreToCamelcase($name)
    {
        return lcfirst(str_replace('_', '', ucwords($name, '_')));
    }
    private function formatToDb($key)
    {
        return strtolower(preg_replace('/([A-Z])/', '_$1', $key));
    }
    private function getPropertyToDb(): array
    {
        $nameAndValue = [];
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();
        foreach ($properties as $property) {
            $nameProperty = $property->getName();
            $namePropertyDb = $this->formatToDb($nameProperty);
            $nameAndValue[$namePropertyDb] = $this->$nameProperty;
        }
        return $nameAndValue;
    }
    public static function findByColumn(string $columnName, $value): array
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `' . static::getTableName() . '` WHERE `' . $columnName . '` = :value';
        return $db->query($sql, [':value' => $value], static::class);
    }

    public function save()
    {
        $data = $this->getPropertyToDb();
        if ($this->getId() === null) $this->insert($data);
        else $this->update($data);
    }
    public function insert(array $dataNull)
    {
        $db = Db::getInstance();
        $data = array_filter($dataNull);
        $fields = [];
        $paramsToValue = [];
        $params = [];
        foreach ($data as $property => $value) {
            $fields[] = '`' . $property . '`';
            $param = ':' . $property;
            $params[] = $param;
            $paramsToValue[$param] = $value;
        }
        $sql = 'INSERT INTO `' . static::getTableName() . '`
              (' . implode(',', $fields) . ') 
              VALUES (' . implode(',', $params) . ')';
        $db->query($sql, $paramsToValue, static::class);
        return;
    }
    public function update(array $data)
    {
        $db = Db::getInstance();
        $params = [];
        $paramsToValue = [];
        foreach ($data as $property => $value) {
            $param = ':' . $property;
            $params[] = '`' . $property . '`=:' . $property;
            $paramsToValue[$param] = $value;
        }
        $sql = 'UPDATE `' . static::getTableName() . '`
                SET ' . implode(',', $params) . ' WHERE `id`=:id';
        $db->query($sql, $paramsToValue, static::class);
    }
    public function delete()
    {
        $db = Db::getInstance();
        $sql = 'DELETE FROM `' . static::getTableName() . '` WHERE `id`=:id';
        $db->query($sql, [':id' => $this->getId()], static::class);
    }
    public static function findAll(): array
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `' . static::getTableName() . '`';
        return $db->query($sql, [], static::class);
    }
    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `' . static::getTableName() . '` WHERE `id`=' . $id;
        $entyties = $db->query($sql, [], static::class);
        return $entyties ? $entyties[0] : null;
    }

    abstract protected static function getTableName();
}