<?php

require_once(LIB_PATH . DS . 'database.php');

class User extends DatabaseObject
{

    protected static $collection_name = "users";
    protected static $fields = array('_id', 'first_name', 'last_name',
        'email_address', 'birthday', 'username', 'password', 'sex', 'friends', 'image', 'bio', 'address', 'phone_number', 'reported_no');
            
    
    public $_id;
    public $first_name;
    public $last_name;
    public $email_address;
    public $birthday;
    public $username;
    public $password;
    public $sex;
    public $friends;
    public $image;
    public $bio;
    public $address;
    public $phone_number;
    public $reported_no;

    public static function authenticate($username, $password)
    {
        $found_user = self::find_by_sql(array("username" => $username, "password" => $password));

        return !empty($found_user) ? array_shift($found_user) : false;
    }
    
    public function full_name() {
        return $this->first_name . " " . $this->last_name;
    }

    public function make_a_list_item() {

        $string = "<a href=\"chat.php?room_type=c&id={$this->_id}\"><li class=\"list-group-item\">
                        <div class=\"col-xs-12 col-sm-3\">
                            <img src=\"{$this->image}\" alt=\"{$this->full_name()}\" class=\"img-responsive img-circle\" />

                            <a href='add_friend.php?id=$this->_id'>Add friend</a>
                         </div>

                    
                        <div class=\"col-xs-12 col-sm-9\">
                             
                            <span class=\"name\">{$this->full_name()}</span><br/>
                           
                        </div>
                        <div class=\"clearfix\"></div>
                    </li></a>";
        return $string;
    }
    
    public function make_a_add_to_group_list_item($group_id) {
        $string = "<a href=\"load_profile.php?id={$this->_id}\"><li class=\"list-group-item\">
                        <div class=\"col-xs-12 col-sm-3\">
                            <img src=\"{$this->image}\" alt=\"{$this->full_name()}\" class=\"img-responsive img-circle\" />

                            <a href='add_to_group.php?user_id={$this->_id}&id={$group_id}'>Add to group</a>
                         </div>

                    
                        <div class=\"col-xs-12 col-sm-9\">
                             
                            <span class=\"name\">{$this->full_name()}</span><br/>
                           
                        </div>
                        <div class=\"clearfix\"></div>
                    </li></a>";
        return $string;
    }

    public function make_a_user_item() {
        $string = "<li><a href=\"load_profile.php?id=$this->_id\">
                        <img src=\"$this->image\" width='70' height='70' alt=\"\"/>
                        <span class=\"name\">{$this->full_name()}</span>
                    </a></li>";
        
        return $string;
    }
    
    public function report() {
        $this->reported_no = $this->reported_no + 1;
    }
}

?>
