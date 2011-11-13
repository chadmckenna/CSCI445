<?php
class Order {
  public $customer        = "";
  public $pbr_quantity    = 0;
  public $pbr_size        = 0;
  
  public $coors_quantity  = 0;
  public $coors_size      = 0;
  
  public $ts_quantity     = 0;
  public $ts_size         = 0;
  
  public $prices;
  
  public $time;
  
  public $items_arr;
  
  function __construct($items) {
    $this->customer       = $items["customer"];
    $this->pbr_quantity   = $items["pbr_q"];
    $this->pbr_size       = $items["pbr_s"];
    $this->coors_quantity = $items["coors_q"];
    $this->coors_size     = $items["coors_s"];
    $this->ts_quantity    = $items["ts_q"];
    $this->ts_size        = $items["ts_s"];
    $this->time           = $items["time"];
    
    $this->prices         = self::initPrices();
    
    $this->items_arr      = $items;
  }
  
  public static function initPrices() {
    return array ("pbr" => .50, "coors" => .75, "ts" => 1.00);
  }
  
  public function getCustomer() {
    return $this->customer;
  }
  
  public function getPbrQuantity() {
    return $this->pbr_quantity;
  }
  
  public function getPbrSize() {
    return $this->pbr_size;
  }
  
  public function getCoorsQuantity() {
    return $this->coors_quantity;
  }
  
  public function getCoorsSize() {
    return $this->coors_size;
  }
  
  public function getTSQuantity() {
    return $this->ts_quantity;
  }
  
  public function getTSSize() {
    return $this->ts_size;
  }
  
  public function getTime() {
    return $this->time;
  }
  
  public function getSubTotal() {
    return ($this->prices["pbr"] * $this->getPbrQuantity() * $this->getPbrSize()) + 
           ($this->prices["coors"] * $this->getCoorsQuantity() * $this->getCoorsSize()) + 
           ($this->prices["ts"] * $this->getTSQuantity() * $this->getTSSize());
  }
  
  public function getTotal() {
    return $this->getSubTotal() * (1.07);
  }
  
  public static function getPrices() {
    return self::initPrices();
  }
  
  public function ifPbr() {
    return ($this->getPbrQuantity() > 0);
  }
  
  public function ifCoors() {
    return ($this->getCoorsQuantity() > 0);
  }
  
  public function ifTS() {
    return ($this->getTSQuantity() > 0);
  }
  
  public function displayCustomer() {
    return '<b>'.$this->getCustomer().'</b>';
  }
  
  public function displayTime() {
    return '<p>(Ordered on '.$this->getTime().')</p>';
  }
  
  public function displayPbr() {
    return '('.$this->getPbrQuantity().')'.' Pabst Blue Ribbon - '.$this->getPbrSize().' Pack ';
  }
  
  public function displayCoors() {
    return '('.$this->getCoorsQuantity().')'.' Coors Banquet - '.$this->getCoorsSize().' Pack ';
  }
  
  public function displayTS() {
    return '('.$this->getTSQuantity().')'.' Trout Slayer - '.$this->getTSSize().' Pack ';
  }
  
  public static function cmp($a, $b) {
      return strcmp($a["customer"], $b["customer"]);
  }
  
  public function displayBasicOrder() {
    $display .= $this->displayTime();
    
    $display .= "<div class=\"order-list\">";
    
    if ($this->ifPbr()) {
      $display .= '<p>'.$this->displayPbr().'</p>';
    }
    if ($this->ifCoors()) {
      $display .= '<p>'.$this->displayCoors().'</p>';
    }
    if ($this->ifTS()) {
      $display .= '<p>'.$this->displayTS().'</p>';
    }
    $display .= "<p id=\"price\">Costing: $".number_format($this->getTotal(), 2).'</p>';
    $display .= '</div>';
    return $display;
  }
  
  public function displayFullOrder() {
    $display = 'Ordered By ';
    $display .= $this->displayCustomer();
    $display .= $this->displayTime();
    
    $display .= "<div class=\"order-list\">";
    
    if ($this->ifPbr()) {
      $display .= '<p>'.$this->displayPbr().'</p>';
    }
    if ($this->ifCoors()) {
      $display .= '<p>'.$this->displayCoors().'</p>';
    }
    if ($this->ifTS()) {
      $display .= '<p>'.$this->displayTS().'</p>';
    }
    $display .= "<p id=\"price\">Costing: $".number_format($this->getTotal(), 2).'</p>';
    $display .= '</div>';
    return $display;
  }
  
  public function writeOrder($filename) {
    $file = fopen($filename, "a");
    fputcsv($file, $this->items_arr);
    fclose($file);
  }
  
  public static function getOrders($filename) {
    if (file_exists($filename)) {
      $file = fopen($filename, "r");
      
      $i = 0;
      while (($data = fgetcsv($file)) !== FALSE) {
        $arr["customer"]= $data[0];
        $arr["pbr_q"]   = $data[1];
        $arr["coors_q"] = $data[2];
        $arr["ts_q"]    = $data[3];
        $arr["pbr_s"]   = $data[4];
        $arr["coors_s"] = $data[5];
        $arr["ts_s"]    = $data[6];
        $arr["time"]    = $data[7];
        
        $order = new Order($arr);
        $orders[$i] = $order;
        
        $i++;
      }
      
      fclose($file);
      
      return $orders;
    } else {
      return 0;
    }
  }
}
?>