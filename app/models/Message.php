<?php

namespace malahov\models;

use malahov\core\Model;
use malahov\core\DbConnect;

class Message extends Model
{
    public function getMessages(){
        $db = DbConnect::getInstance();
        $stmt = $db->getConnection()->prepare("SELECT message.message_id, message.content, user.login, message.created_at FROM message LEFT JOIN user ON (message.user_id = user.user_id)");
        $stmt->execute();

        while ($row = $stmt->fetch(\PDO::FETCH_LAZY))
        {
            $message['created_at'] = $row['created_at'];
            $message['message_id'] = $row['message_id'];
            $message['login'] = $row['login'];
            $message['content'] = $row['content'];
            $messages[] = $message;

        }
        return $messages;
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