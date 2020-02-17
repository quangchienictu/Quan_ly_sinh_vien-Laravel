<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lop;
use App\Khoa;
use App\SinhVien;
use App\MonHoc;
class ThongKe extends Controller
{
    public function index(){
    	$lop = Lop::count();
    	$khoa=Khoa::count();
    	$sv=SinhVien::count();
    	$monhoc=MonHoc::count();
    	return view('admin.layout.content')->with(['lop'=>$lop,'khoa'=>$khoa,'sv'=>$sv,'mon'=>$monhoc]);
    }
}
