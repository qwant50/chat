<?php

namespace malahov\models;

use malahov\core\Model;
use malahov\core\DbConnect;

class Signup extends Model
{
    public function isUserExist($login, $password)
    {
        $db = DbConnect::getInstance('chat');
        $stmt = $db->getConnection()->prepare("SELECT user_id FROM user WHERE  login = :login AND password = :password LIMIT 1");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return (bool)$stmt->fetch(\PDO::FETCH_LAZY);
    }

    public function isEmailExist($email)
    {
        $db = DbConnect::getInstance('chat');
        $stmt = $db->getConnection()->prepare("SELECT user_id FROM user WHERE  email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return (bool)$stmt->fetch(\PDO::FETCH_LAZY);
    }

    public function saveUser($login, $password, $email)
    {
        $db = DbConnect::getInstance('chat');
        $stmt = $db->getConnection()->prepare("INSERT INTO user (user_id, login, password, email) VALUES (NULL, :login, :password, :email)");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
}