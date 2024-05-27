<?php

namespace Services;

class Db
{
    private $pdo;
    private static $instance;

    private function __construct()
    {
        $dbOptions = require('settings.php');
        $this->pdo = new \PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['database'],
            $dbOptions['username'],
            $dbOptions['password']
        );
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    public function query(string $sql, $params = [], string $className = 'StdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);
        if ($result === false) {
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }
}