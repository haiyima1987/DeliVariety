<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $path = '../img/';
    //
    protected $fillable = [
        'item_name', 'img_path', 'price', 'category_id'
    ];

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getImgPathAttribute($value)
    {
        return $this->path . $value;
    }

    public function Orders() {
        return $this->belongsToMany('App\order', 'menu_order', 'menu_id', 'order_id');
    }
}