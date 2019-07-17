<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable=[
        'employeeid',
        'employeename',
        'designation_id',
        'department_id',
        'mobile',
        'status'
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function designation(){
        return $this->belongsTo(Designation::class);
    }
}
