<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SinhVien;
use App\Lop;
class SinhVienController extends Controller
{
  public function index(){
   $data = SinhVien::all();
   return view("admin.sinhvien.danhsach")->with('sinhvien',$data);
 }
 public function destroy($id){
   $sv = SinhVien::find($id);
   $sv->delete();
   return redirect('sinhvien/danhsach')->with('thongbao','Xóa thành công !!!');
 }
 public function create(){
   $last=SinhVien::orderBy('maSV', 'desc')->first()->maSV+1;
   $lop = Lop::all();
   return view('admin.sinhvien.them',['lop'=>$lop,'last'=>$last]);
 }
 public function store(Request $req){

  $this->validate($req, 
    [
      'tenSV' => 'required|max:100|min:3',
    ],
    [

      'tenSV.required' =>'Bạn chưa nhập tên Sinh Vien  ',
      'tenSV.max'=>'Tên sinh viên  phải có độ dài nhỏ hơn 100 kí tự ',
      'tenSV.min'=>'Tên sinh viên  phải có độ dài lớn hơn 3 kí tự ',
    ]
  );
  $sv = new SinhVien();
  $sv->tenSV=$req->tenSV;
  $sv->gioitinh=$req->gioitinh;
  $sv->maLop=$req->maLop;
  $sv->gioitinh=$req->gioitinh;
  $sv->sdt=$req->sdt;
  $sv->namsinh=$req->namsinh;
  $sv->diachi=$req->diachi;
  $sv->email=$req->email;
  $sv->save();
  return redirect('sinhvien/them')->with('thongbao','Thêm thành công !');
  }
  public function edit($maSV){
    $sv = SinhVien::find($maSV);
    $lop = Lop::all();
    return view('admin.sinhvien.sua')->with(['sv'=>$sv,'lop'=>$lop]);
  }
  public function update(Request $req,$maSV){
     $sv = SinhVien::find($maSV);
    $this->validate($req, 
    [
      'tenSV' => 'required|max:100|min:3',
    ],
    [

      'tenSV.required' =>'Bạn chưa nhập tên Sinh Vien  ',
      'tenSV.max'=>'Tên sinh viên  phải có độ dài nhỏ hơn 100 kí tự ',
      'tenSV.min'=>'Tên sinh viên  phải có độ dài lớn hơn 3 kí tự ',
    ]
  );
 
    $sv->tenSV=$req->tenSV;
    $sv->gioitinh=$req->gioitinh;
    $sv->maLop=$req->maLop;
    $sv->gioitinh=$req->gioitinh;
    $sv->sdt=$req->sdt;
    $sv->namsinh=$req->namsinh;
    $sv->diachi=$req->diachi;
    $sv->email=$req->email;
    $sv->save();
   return redirect('sinhvien/sua/'.$maSV)->with('thongbao','Sửa thành công !');

  }

}
