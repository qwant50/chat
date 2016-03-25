<?php

namespace malahov\models;

use malahov\core\Model;
use malahov\core\DbConnect;

class modelSignup extends Model
{
    public function isUserExist($login, $password){
        $db = DbConnect::getInstance();
        $stmt = $db->getConnection()->prepare("SELECT user_id FROM user WHERE  login = :login AND password = :password LIMIT 1");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $row = $stmt->fetch(\PDO::FETCH_LAZY) ? true : false;
    }

    public function saveUser($login, $password, $email)
    {
        $db = DbConnect::getInstance();
        $stmt = $db->getConnection()->prepare("INSERT INTO user (user_id, login, password, email) VALUES (NULL, :login, :password, :email)");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
}