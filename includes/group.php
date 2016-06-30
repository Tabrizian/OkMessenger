<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 6/30/16
 * Time: 7:49 PM
 */

class Group extends DatabaseObject{

    public static $fields = array('_id', 'name', 'description', 'picture', 'members', 'mentions', 'hash_tags', 'message_ids');
    public static $collection_name = "groups";
    public $_id;
    public $name;
    public $description;
    public $picture;
    public $members;
    public $messages;
}