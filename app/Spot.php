<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $path = '../img/';
    //
    protected $fillable = ['availability', 'img_path'];

    public function getAvailablePathAttribute($value)
    {
        return $this->path . $value;
    }

    public function getReservedPathAttribute($value)
    {
        return $this->path . $value;
    }
}
