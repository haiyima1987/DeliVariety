<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = ['table_id', 'date', 'time_span', 'name', 'phone', 'email'];

    public function TimeSpan() {
        return $this->belongsTo('App\TimeSpan', 'time_span');
    }
}
