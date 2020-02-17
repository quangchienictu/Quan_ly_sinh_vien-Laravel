<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonHoc;
class MonHocController extends Controller
{
	public function index(){
		$data= MonHoc::all();
		return view('admin.monhoc.danhsach',['monhoc'=>$data]);
	}
	public function destroy($id){
		$monhoc = MonHoc::find($id);
		$monhoc->delete();
		return redirect('monhoc/danhsach')->with('thongbao','Xóa thành công !!!');
	}
	public function create(){

		$last=MonHoc::orderBy('maMon', 'desc')->first()->maMon+1;
		return view('admin.monhoc.them',['last'=>$last]);
	}
	public function store(Request $req){

		$this->validate($req, 
			[
				'tenMon' => 'required|max:100|unique:mon_hoc',
				'soTin' =>'required|min:1|max:50'
			],
			[
				'tenMon.unique' =>'Tên Môn đã tồn tại',
				'tenMon.required' =>'Bạn chưa nhập tên môn  ',
				'tenMon.max'=>'Tên Môn  phải có độ dài nhỏ hơn 100 kí tự ',
				'soTin.required'=>'Bạn chưa nhập số Tín  ',
				'soTin.min'=>'Số tín chỉ phải lớn hơn 0  ',
				'soTin.max'=>'Số tín chỉ phải nhỏ hơn 50  '
			]
		);

		$mon = new MonHoc;
		$mon->tenMon= $req->tenMon;
		$mon->soTin=$req->soTin;
		$mon->save();
		return redirect('monhoc/them')->with(['thongbao'=>'Bạn đã thêm thành công !']);
	
	}
	public function edit($maMon){
		$mon=MonHoc::find($maMon);
		return view('admin.monhoc.sua')->with('mon',$mon);
	}
	public function update(Request $req,$maMon){
		$mon=MonHoc::find($maMon);
		if($mon->tenMon!=$req->tenMon){
			$this->validate($req, 
			[
				'tenMon' => 'required|max:100|unique:mon_hoc',
				'soTin' =>'required|min:1|max:50'
			],
			[
				'tenMon.unique' =>'Tên Môn đã tồn tại',
				'tenMon.required' =>'Bạn chưa nhập tên môn  ',
				'tenMon.max'=>'Tên Môn  phải có độ dài nhỏ hơn 100 kí tự ',
				'soTin.required'=>'Bạn chưa nhập số Tín  ',
				'soTin.min'=>'Số tín chỉ phải lớn hơn 0  ',
				'soTin.max'=>'Số tín chỉ phải nhỏ hơn 50  '
			]
		);
		}
		$mon->tenMon= $req->tenMon;
		$mon->soTin=$req->soTin;
		$mon->save();
		return redirect('monhoc/sua/'.$maMon)->with(['thongbao'=>'Bạn đã sửa thành công !']);
	}
}
