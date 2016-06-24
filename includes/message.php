<?php

require_once(LIB_PATH . DS . 'database.php');

class Message extends DatabaseObject
{

    protected static $collection_name = "messages";
    protected static $fields = array('id', 'text', 'from_user');

    public $id;
    public $text;
    public $from_user;
}

?>