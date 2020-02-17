<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    protected $table ='khoa';
    public $timestamps = false;
    public  $primaryKey = 'maKhoa';
    
    public function lop(){
    	return $this->hasMany('App\Lop','maKhoa');
    }
    public function sinhvien(){
    	return $this->hasManyThrough('App\SinhVien','App\Lop','maKhoa','maLop');
    }
    
}
