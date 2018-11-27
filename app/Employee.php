<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    public function orders()
    {
        return $this->hasMany('App\Order', 'emp_id', 'emp_id');
    }
}
