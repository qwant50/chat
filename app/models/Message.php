<?php

namespace malahov\models;

use malahov\Bootstrap;
use malahov\core\Model;
use malahov\core\DbConnect;

class Message extends Model
{
    public function getMessages()
    {
        $db = DbConnect::getInstance(Bootstrap::$config['db'][0])->getConnection();
        $stmt = $db->prepare("SELECT message.message_id, message.content, user.login, message.created_at
                                               FROM message LEFT JOIN user ON (message.user_id = user.user_id)
                                               WHERE message.created_at >= DATE_SUB(NOW(),INTERVAL 2 HOUR)");
        $stmt->execute();
        $messages = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return empty($messages) ? [] : $messages;
    }

    public function saveMessage($login, $content)
    {
        $db = DbConnect::getInstance(Bootstrap::$config['db'][0])->getConnection();
        $stmt = $db->prepare("INSERT INTO message (user_id, content) VALUES ((SELECT user_id FROM user WHERE login = :login LIMIT 1), :content)");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
    }
}