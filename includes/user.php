<?php

require_once(LIB_PATH . DS . 'database.php');

class User extends DatabaseObject
{

    protected static $collection_name = "users";
    protected static $fields = array('id', 'first_name', 'last_name',
        'email_address', 'friends');

    public $id;
    public $first_name;
    public $last_name;
    public $email_address;
    public $friends;
}

?>
