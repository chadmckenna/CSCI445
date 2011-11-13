<?php
require_once(dirname(__FILE__) . "/connect.php");

class ActiveRecord extends Connect {
  private $id;  
  
  function __construct($id = null) {
    $this->id = $id;
    parent::__construct();
    if (!is_null($id)) {
      $this->get();
    }
  }
  
  public function destroy() {
    foreach ($this as $var => $value) {
      unset($var);
    }
  }
  
  public function save() {
    $table = $this->getTable();
    
    $size = sizeof(get_object_vars($this));
    
    if (!is_null($this->id)) {
      // If the ID is set, update.
      $update = "UPDATE $table SET ";
      
      $i = 1;
      foreach ($this as $var => $value) {
        if ($i == $size) {
          $update = substr(trim($update), 0, -1);
          $update .= " WHERE " . $var . "=" . $value . "";
        } else {
          $update .= "" . $var . "='" . $value . "', ";
        }
        $i++;
      }

      $results = mysql_query($update);
      $this->get();
    } else {
      // If the ID is not set, insert.
      $insert = "INSERT INTO $table ";
      $columns = "(";
      $values = "(";
      
      $i = 1;
      foreach ($this as $var => $value) {
        if ($i == $size) {
          // Nothing yet
        } else {
          $columns .= "" . $var . ", ";
          $values .= "'" . $value . "', ";
        }
        $i++;
      }
      
      $insert .= substr(trim($columns), 0, -1) . ") VALUES " . substr(trim($values), 0, -1) . ")";

      $results = mysql_query($insert);
      $this->id = mysql_insert_id();
    }
  }
  
  public function delete() {
    if (!is_null($this->id)) {
      $table = $this->getTable();
      $delete = "DELETE FROM " . $table . " WHERE id='" . $this->id . "'";
      
      $results = mysql_query($delete);
    } else {
      return 0;
    }
  }
  
  public function getId() {
    return $this->id;
  }
  
  public function get() {
    $select = "SELECT * FROM " . $this->getTable() . " WHERE id=" . $this->id;
    $results = mysql_query($select);

    $row = mysql_fetch_assoc($results);
    
    foreach ($this as $var => $value) {
      $this->$var = $row[$var];
    }
  }
  
  public function getAll() {
    $select = "SELECT * FROM " . $this->getTable();
    return mysql_query($select);
  }
  
  private function getTable() {
    return strtolower(get_called_class()) . "s";
  }  
}
?>