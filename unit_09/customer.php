<?php
require_once(dirname(__FILE__) . "/active_record.php");

class Customer extends ActiveRecord {
  public $name;
}

?>