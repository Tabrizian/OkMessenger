<?php

require_once(LIB_PATH.DS.'database.php');

class DatabaseObject {

    public static function find_all() {
        global $database;

        $collection = static::$collection_name;
        $result_set = static::find_by_sql();

        return $result_set;
    }

    public static function find_by_id($id = 0) {
        global $database;


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

        $attributes = $this->sanitized_attributes();
        $sql  = "INSERT INTO ". static::$table_name . "(";
        $sql .= join(", ", array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";

        if($database->query($sql)) {
            $this->id = $database->inserted_id();
            return true;
        } else {
            return false;
        }
    }

    public function update() {
        global $database;

        $attributes = $this->sanitized_attributes();
        $attributes_pairs = array();
        foreach($attributes as $key => $value) {
            $attributes_pairs[] = "{$key}='{$value}'";
        }
        $sql  = "UPDATE ". static::$table_name . " SET ";
        $sql .= join(", ", $attributes_pairs);
        $sql .= " WHERE id=". $database->escape_value($this->id);
        if($database->query($sql)) {
            return true;
        } else {
            return false;
        }
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

}
