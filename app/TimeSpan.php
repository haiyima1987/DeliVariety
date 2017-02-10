<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSpan extends Model
{
    protected $primaryKey = 'id';
    //
    protected $fillable = ['id', 'span'];

    public function Reservations() {
        return $this->hasMany('App\Reservation', 'time_span', 'id');
    }
}
