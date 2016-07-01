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
        $str = "<span class=\"label label-info\">" . User::find_by_id($this->from_user_id)->full_name() . "</span>&nbsp;&nbsp; $this->text<br/>";

        return $str;
    }

    public static function find_all_ids($ids = array()) {
        $in_this_range = ['$in' => $ids];
        $query = ['_id' => $in_this_range];
        return self::find_by_sql($query);
    }

    public static function find_all_ids_limited($ids = array(), $limit){
        if(count($ids) >= $limit) {
            
            rsort($ids);
            $count = count($ids);
            for ($i = $limit; $i < $count; $i++)
                unset($ids[$i]);
        }

        return self::find_all_ids($ids);
    }
}

?>