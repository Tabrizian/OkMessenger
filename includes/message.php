<?php

require_once(LIB_PATH . DS . 'database.php');

class Message extends DatabaseObject
{

    protected static $collection_name = "messages";
    protected static $fields = array('_id', 'from_user_id', 'text', 'is_private', 'destruction_time');

    public $_id;
    public $text;
    public $is_private;
    public $destruction_time;
    public $from_user_id;

    public function output_message()
    {
        $str = "<span class=\"label label-info\">" . User::find_by_id($this->from_user_id)->full_name() . "</span>&nbsp;&nbsp;<br/>";

        return $str;
    }

}

?>