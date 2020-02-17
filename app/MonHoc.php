<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    protected $table='mon_hoc';
     public  $primaryKey = 'maMon';
     public $timestamps = false;
}
