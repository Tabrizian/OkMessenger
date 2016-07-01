<?php

/**
 * Created by PhpStorm.
 * User: iman
 * Date: 6/30/16
 * Time: 7:10 PM
 */
class Chat
{
    public static $fields = ['_id', 'unknown', 'messages', 'users'];
    public static $collection_name = 'chats';

    public $_id;
    public $unknown;
    public $messages;
    public $users;
}