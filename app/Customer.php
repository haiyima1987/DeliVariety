<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'email';
    //
    protected $fillable = [
        'email', 'first_name', 'last_name', 'address'
    ];

    public function Orders()
    {
        $this->hasMany('App/Order', 'email', 'email');
    }
}
