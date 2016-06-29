<?php

require_once(LIB_PATH . DS . 'database.php');

class User extends DatabaseObject
{

    protected static $collection_name = "users";
    protected static $fields = array('_id', 'first_name', 'last_name',
        'email_address', 'birthday', 'username', 'password', 'sex', 'friends');
    
    
    public $_id;
    public $first_name;
    public $last_name;
    public $email_address;
    public $birthday;
    public $username;
    public $password;
    public $sex;
    public $friends;

    public static function authenticate($username, $password)
    {
        $found_user = self::find_by_sql(array("username" => $username, "password" => $password));

        return !empty($found_user) ? array_shift($found_user) : false;
    }
}

?>
