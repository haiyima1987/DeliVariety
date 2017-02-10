<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    public $incrementing = false;
    //
    protected $fillable = [
        'order_id', 'email', 'discount'
    ];

    public function Menus() {
        return $this->belongsToMany('App\Menu', 'menu_order', 'order_id', 'menu_id');
    }
}
