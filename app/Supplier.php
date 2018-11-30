<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";
    public function products()
    {
        return $this->hasMany('App\Products', 'sup_id', 'sup_id');
    }
}
