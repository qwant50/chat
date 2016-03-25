<?php
namespace malahov\core;

class DbConnect
{
    private $_params;
    private $_connection;
    private static $instance;


    private function __construct()
    {
        try {
            $this->_params = require 'configs/development/db.php';
            $this->_connection = new \PDO(
                "mysql:host={$this->_params['host']};dbname={$this->_params['dbname']}",
                $this->_params['username'],
                $this->_params['password']
            );
            $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->_connection;
    }
}
