<?php

/**
 * Created by PhpStorm.
 * User: iman
 * Date: 6/30/16
 * Time: 7:10 PM
 */
class Chat extends DatabaseObject
{
    public static $fields = ['_id', 'unknown', 'messages', 'users'];
    public static $collection_name = 'chats';

    public $_id;
    public $unknown;
    public $messages;
    public $users;

    public static function find_by_participants($user_id1, $user_id2)
    {
        $chats = Chat::find_all();
        foreach ($chats as $chat) {
            if(($chat->users[0] == $user_id1 && $chat->users[1] == $user_id2) ||
                ($chat->users[0] == $user_id2 && $chat->users[1] == $user_id1))
                return $chat;
        }
        return false;
    }
}