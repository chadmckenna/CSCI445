<?php
require_once(dirname(__FILE__) . "/active_record.php");

class Beer extends ActiveRecord {
  public $name;
  public $price;
}
?>