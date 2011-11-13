<?php
require_once(dirname(__FILE__) . "/active_record.php");

class Order extends ActiveRecord {
  public $customer_id;
  public $sub_total;
  public $total;
}
?>