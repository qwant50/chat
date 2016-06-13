<?php
namespace malahov\core;

class DbConnect
{
    private $connection;
    private static $instances;

    private function __construct(array $params)
    {
        try {
            $this->connection = new \PDO(
                "mysql:host=$params[host];dbname=$params[dbname];charset=utf8",
                $params['username'],
                $params['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die(__CLASS__ . " $params[connectionName] " . $e->getMessage());
        }
    }

    public static function getInstance(array $params)
    {
        return isset(self::$instances[$params['connectionName']]) ? self::$instances[$params['connectionName']] :
            self::$instances[$params['connectionName']] = new self($params);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
