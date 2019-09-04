<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable=[
        'pageno',
        'pagename',
        'operatorid',
        'tracingtime_1st_edition',
        'tracingtime_2nd_edition',
        'status'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class,'operatorid');
    }
    public function page(){
        return $this->hasMany(DaywisePage::class);
    }
}
