<?php
require_once(dirname(__FILE__) . "/active_record.php");

class Order_Item extends ActiveRecord {
  public $order_id;
  public $beer_id;
  public $count;
  
  public function getAllByOrderId($id) {
    $select = "SELECT * FROM order_items WHERE order_id=" . $id;
    return mysql_query($select);
  }
}

?>