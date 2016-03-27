<?php

namespace malahov\models;

use malahov\core\Model;
use malahov\core\DbConnect;

class Message extends Model
{
    public function getMessages()
    {
        $db = DbConnect::getInstance();
        $stmt = $db->getConnection()->prepare("SELECT message.message_id, message.content, user.login, message.created_at
                                               FROM message LEFT JOIN user ON (message.user_id = user.user_id)
                                               WHERE message.created_at >= DATE_SUB(NOW(),INTERVAL 2 HOUR)");
        $stmt->execute();

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $messages[] = $row;
        }
        return $messages ?: [];
    }

    public function saveMessage($login, $content)
    {
        $db = DbConnect::getInstance();
        $stmt = $db->getConnection()->prepare("INSERT INTO message (user_id, content) VALUES ((SELECT user_id FROM user WHERE login = :login), :content)");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
    }
}