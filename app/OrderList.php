<?php
/**
 * Created by PhpStorm.
 * User: Haiyi
 * Date: 1/4/2017
 * Time: 2:04 PM
 */

namespace App;


class OrderList
{
    public $items;
    public $total_quantity;
    public $total_price;

    public function __construct()
    {
        $this->items = array();
        $this->total_quantity = 0;
        $this->total_price = 0;
    }

    public function add_item($item, $id)
    {
        if (array_key_exists($id, $this->items)) {
            $this->items[$id]['qty']++;
            $this->items[$id]['subTotal'] += $item['price'];
        } else {
            $this->items[$id] = array('item' => $item, 'qty' => 1, 'subTotal' => $item['price']);
        }
        $this->total_quantity++;
        $this->total_price += $item['price'];
    }

    public function remove_item($item, $id)
    {
        if ($this->items[$id]['qty'] == 1) {
            unset($this->items[$id]);
        } else {
            $this->items[$id]['qty']--;
            $this->items[$id]['subTotal'] -= $item['price'];
        }
        $this->total_quantity--;
        $this->total_price -= $item['price'];
    }
}