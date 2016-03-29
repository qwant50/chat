<?php

namespace malahov\models;

use malahov\core\Model;
use malahov\core\DbConnect;

class Signup extends Model
{
    public function isUserExist($login){
        $db = DbConnect::getInstance();
        $stmt = $db->getConnection()->prepare("SELECT user_id FROM user WHERE  login = :login LIMIT 1");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        return $row = $stmt->fetch(\PDO::FETCH_LAZY) ? true : false;
    }

    public function isEmailExist($email){
        $db = DbConnect::getInstance();
        $stmt = $db->getConnection()->prepare("SELECT user_id FROM user WHERE  email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
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