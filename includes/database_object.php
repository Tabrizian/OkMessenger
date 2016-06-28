<?php

require_once(LIB_PATH.DS.'database.php');

class DatabaseObject implements JsonSerializable{

    public static function find_all() {
        $result_set = static::find_by_sql();

        return $result_set;
    }

    public static function find_by_id($id = 0) {
        $query = array("id" => $id);

        $result_array = find_by_sql($query);

        return !empty($result_array) ? array_shift($result_array) : false;
    }


    public static function find_by_sql($sql = array()) {
        global $database;

        $collection = static::$collection_name;

        $result_set = $database->$collection->find($sql);
        $object_array = array();

        while($row = $result_set->next()) {
            $object_array[] = static::instantiate($row);
        }

        return $object_array;
    }

    public function save() {
        // A new record won't have an id yet.
        return isset($this->id) ? $this->update() : $this->create();
    }

    private static function instantiate($record) {
        $class_name = get_called_class();
        $object = new $class_name;

        foreach($record as $attribute=>$value) {
            if($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }

        return $object;
    }

    protected function has_attribute($attribute) {
        $object_vars = $this->attributes();

        return array_key_exists($attribute, $object_vars);
    }

    protected function attributes() {
        $attributes = array();
        foreach(static::$fields as $field) {
            if(property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }

        return $attributes;
    }

    public function insert() {
        global $database;

        $collection = static::$collection_name;
        $result = $database->$collection->insert($this);

        if($result)
            return true;
        else
            return false;

    }

    public function update() {
        global $database;

        $collection = static::$collection_name;
        $query = ["id" => $this->id];
        $attributes = $this->attributes();

        $database->$collection->findAndModify($query, $attributes);
    }

    public function delete() {
        global $database;

        $sql  = "DELETE FROM " . static::$table_name ;
        $sql .= " WHERE id=". $database->escape_value($this->id);
        $sql .= " LIMIT 1";

        if($database->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize() {
        return $this->attributes();
    }
}
