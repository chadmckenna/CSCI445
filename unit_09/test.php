<?php
require_once(dirname(__FILE__) . "/beer.php");
require_once(dirname(__FILE__) . "/customer.php");
require_once(dirname(__FILE__) . "/order.php");
require_once(dirname(__FILE__) . "/order_item.php");

$beer = new Beer();
$beer->name = "Coors Light";
$beer->price = .65;
$beer->save();

$customer = new Customer();
$customer->name = "Robert";
$customer->save();

$order = new Order();
$order->customer_id = $customer->getId();
$order->sub_total = 100;
$order->total = $order->sub_total*1.07;
$order->save();

$order_item = new Order_Item();
$order_item->beer_id = $beer->getId();
$order_item->count = 12;
$order_item->save();

?>