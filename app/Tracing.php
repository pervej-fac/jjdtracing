<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tracing extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'tracing_no',
        'tracing_date',
        'publication_date',
        'status'
    ];

    public function tracing_details(){
        return $this->hasMany(TracingDetail::class);
    }
    /*public function operator(){
        return $this->belongsTo(Employee::class);
    }*/

}
