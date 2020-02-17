<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diem;
use App\MonHoc;
use App\SinhVien;
class DiemController extends Controller
{
    public function index(){
    	$data = Diem::all();
    	return view('admin.diem.danhsach')->with('diem',$data);
    }
    public function destroy($id){
    	$diem = Diem::find($id);
    	$diem->delete();
    	return redirect('diem/danhsach')->with('thongbao','Xóa thành công !!!');
    }
    public function create(){

		$sv = SinhVien::all();
		$monhoc=MonHoc::all();
		return view('admin.diem.them',['sv'=>$sv,'monhoc'=>$monhoc]);
	}
	public function store(Request $req){
		$diem = new Diem;
		$diem->maSV= $req->maSV;
		$diem->maMon=$req->maMon;
		$diem->diemhocphan=$req->diemhocphan;
		$diem->diemthi=$req->diemthi;
		$diem->save();
		return redirect('diem/them')->with(['thongbao'=>'Bạn đã thêm thành công !']);

	
	}
	public function edit($id){
		/*$diem=Diem::find($id);
		return view('admin.diem.sua')->with('diem',$diem);*/
		$diem=Diem::find($id);
		return view('admin.diem.sua')->with('diem',$diem);
		print_r($diem);

	}
	public function update(Request $req,$id){
		$diem=Diem::find($id);
		$diem->diemhocphan=$req->diemhocphan;
		$diem->diemthi=$req->diemthi;
		$diem->save();
		return redirect('diem/sua/'.$id)->with('thongbao','Sửa thành công !');
	}

}
