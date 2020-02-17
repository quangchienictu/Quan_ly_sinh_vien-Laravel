<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    protected $table = "diem";
 	public  $primaryKey = 'id';
 	 public $timestamps = false;
    public function monhoc(){
    	return $this->belongsTo('App\MonHoc','maMon');
    }
    public function sinhvien(){
    	return $this->belongsTo('App\SinhVien','maSV');
    }
}
