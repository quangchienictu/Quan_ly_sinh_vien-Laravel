<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table = "lop";
    public $timestamps = false;
    public  $primaryKey = 'maLop';
    function khoa(){
    	  return $this->belongsTo('App\Khoa','maKhoa');
    }
    function sinhvien(){
    	return $this->hasMany('App\SinhVien','maLop');
    }
  	
}
