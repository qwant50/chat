<?php
namespace malahov\core;

class DbConnect
{
    private $connection;
    private static $instances;


    private function __construct($connectionName)
    {
        try {
            $params = require 'configs/development/db.php';

            $this->connection = new \PDO(
                "mysql:host={$params[$connectionName]['host']};dbname={$params[$connectionName]['dbname']};charset={$params[$connectionName]['charset']}",
                $params[$connectionName]['username'],
                $params[$connectionName]['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die(__CLASS__ . " $connectionName " . $e->getMessage());
        }
    }

    public static function getInstance($connectionName)
    {
        return self::$instances[$connectionName] ? : self::$instances[$connectionName] = new self($connectionName);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
