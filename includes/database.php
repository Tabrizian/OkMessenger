<?php

require_once(LIB_PATH . DS . "config.php");

class MongoDatabase {

    private $connection;
    public $my_db;
    public $last_query;

    function __construct() {
        $this->open_connection();
    }

    public function open_connection() {
        $connection = new MongoClient();
        $this->my_db = $connection->DB_NAME;
        if(!$this->connection) {
            die("Database connection failed");
        }
    }

    public function close_connection() {
        if(isset($this->connection)) {
            $this->connection.$this->close_connection();
            unset($this->connection);
            unset($my_db);
        }
    }

}
$client = new MongoDatabase();
$database = $client->my_db;
$db = &$database;
?>
