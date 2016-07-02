<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 7/2/16
 * Time: 1:43 PM
 */

public class Channel {
    public static $fields = ['_id', 'admins', 'messages', 'members'];
    public static $collection_name = 'channels';

    public $_id;
    public $admins;
    public $messages;
    public $members;

}