<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 6/30/16
 * Time: 7:49 PM
 */

class Group extends DatabaseObject{

    public static $fields = array('_id', 'name', 'description', 'picture', 'members', 'messages');
    public static $collection_name = "groups";
    public $_id;
    public $name;
    public $description;
    public $picture;
    public $members;
    public $messages;

    public static function find_all_user_id($id) {
        $groups = self::find_all();
        $members_groups = array();
        foreach ($groups as $group) {
            $members = $group->members;
            if(in_array($id, $members)) {
                log_action("Found a member");
                $members_groups[] = $group;
            }
        }
        return $members_groups;
    }
    
    public function make_a_list_item() {
        $string = "<a href=\"chat.php?room_type=g&id={$this->_id}\"><li class=\"list-group-item\">
                        <div class=\"col-xs-12 col-sm-3\">
                            <img src=\"{$this->picture}\" alt=\"{$this->name}\" class=\"img-responsive img-circle\" />

                           
                         </div>

                    
                        <div class=\"col-xs-12 col-sm-9\">
                             
                            <span class=\"name\">{$this->name}</span><br/>
                            <span class=\"name\">{$this->description}</span><br/>
                           
                        </div>
                        <div class=\"clearfix\"></div>
                    </li></a>";
        return $string;
    }

}