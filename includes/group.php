<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 6/30/16
 * Time: 7:49 PM
 */

class Group extends DatabaseObject{

    public $fields = array('_id', 'name', 'description', 'picture', 'members', 'mentions', 'hash_tags', 'message_ids');
    
    public $_id;
    public $name;
    public $description;
    public $picture;
    public $members;
    public $mentions;
    public $hash_tags;
    public $message_ids;
}