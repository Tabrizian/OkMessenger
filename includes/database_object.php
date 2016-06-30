<?php

require_once(LIB_PATH . DS .'database.php');

class DatabaseObject implements JsonSerializable{

    public static function find_all() {
        $result_set = static::find_by_sql();

        return $result_set;
    }

    public static function find_by_id($_id = 0) {
        $query = array("_id" => new MongoId($_id));

        $result_array = self::find_by_sql($query);

        return !empty($result_array) ? array_shift($result_array) : false;
    }


    public static function find_by_sql($sql = array()) {
        global $database;

        $collection = static::  $collection_name;

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
        $to_be_inserted = $this->jsonSerialize();
        $result = $database->$collection->insert($to_be_inserted);

        $this->_id = $to_be_inserted['_id'];

        if($result)
            return true;
        else
            return false;

    }

    public function update() {
        global $database;

        $collection = static::$collection_name;
        $query = ["_id" => $this->_id];
        $attributes = $this->attributes();
        unset($attributes['_id']);
        $database->$collection->findAndModify($query, $attributes);
    }

    public function delete() {
        global $database;

        $query = ["_id" => $this->_id];
        $collection = static::$collection_name;

        $status = $database->$collection->remove($query, array("justOne" => true));

        if($status == 1) {
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
        $attributes = $this->attributes();
        unset($attributes['_id']);

        log_action("What what");

        return $attributes;
    }
}
