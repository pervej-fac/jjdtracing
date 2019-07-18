<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable=[
        'pageno',
        'pagename',
        'operatorid',
        'tracingtime',
        'status'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class,'operatorid');
    }
}
