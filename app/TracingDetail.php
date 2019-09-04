<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TracingDetail extends Model
{
    protected $fillable=[
        'tracing_id',
        'page_no',
        'page_name',
        'edition',
        'operator_id',
        'tracing_time',
        'recieved_time',
        'recieved_by',
        'status',
        'remarks'
    ];
}
