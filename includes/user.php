<?php

require_once(LIB_PATH . DS . 'database.php');

class User extends DatabaseObject
{

    protected static $collection_name = "users";
    protected static $fields = array('_id', 'first_name', 'last_name',
        'email_address', 'birthday', 'username', 'password', 'sex', 'friends', 'image', 'bio', 'address', 'phone_number');
            
    
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

    public static function authenticate($username, $password)
    {
        $found_user = self::find_by_sql(array("username" => $username, "password" => $password));

        return !empty($found_user) ? array_shift($found_user) : false;
    }
    
    public function full_name() {
        return $this->first_name . " " . $this->last_name;
    }

    public function make_a_list_item() {
        $string = " <li class=\"list-group-item\">
                        <div class=\"col-xs-12 col-sm-3\">
                            <img src=\"{$this->image}\" alt=\"{$this->full_name()}\" class=\"img-responsive img-circle\" />
                        </div>
                        <div class=\"col-xs-12 col-sm-9\">

                            <span class=\"name\">{$this->full_name()}</span><br/>
                            <span class=\"glyphicon glyphicon-map-marker text-muted c-info\" data-toggle=\"tooltip\" title=\"{$this->address}\"></span>
                            <span class=\"visible-xs\"> <span class=\"text-muted\">{$this->address}</span><br/></span>
                            <span class=\"glyphicon glyphicon-earphone text-muted c-info\" data-toggle=\"tooltip\" title=\"{$this->phone_number}\"></span>
                            <span class=\"visible-xs\"> <span class=\"text-muted\">$this->phone_number</span><br/></span>
                            <span class=\"fa fa-comments text-muted c-info\" data-toggle=\"tooltip\" title=\"{$this->email_address}\"></span>
                            <span class=\"visible-xs\"> <span class=\"text-muted\">{$this->email_address}</span><br/></span>

                        </div>
                        <div class=\"clearfix\"></div>
                    </li>";
        return $string;
    }
}

?>
