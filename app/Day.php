<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable=[
        'name'
    ];

    public function day(){
        return $this->hasMany(DaywisePage::class);
    }
    public function page(){
        return $this->belongsTo(Pages::class);
    }
}
