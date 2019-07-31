<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaywisePage extends Model
{
    protected $fillable=[
        'day_id',
        'page_id',
        'status'
    ];
}
