<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    protected $table="sinhvien";
    public  $primaryKey = 'maSV';
    public $timestamps = true;

    public function lop(){
    	return $this->belongsTo('App\lop','maLop');
    }
}
