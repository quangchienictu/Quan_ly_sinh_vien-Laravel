<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lop;
use App\Khoa;
class LopController extends Controller
{
    public function index(){
    	$data= Lop::all();
    	return view('admin.lop.danhsach')->with('lop',$data);
    	
    }
      public function destroy($id){
    	$lop = Lop::find($id);
    	$lop->delete();
    	return redirect('lop/danhsach')->with('thongbao','Xóa thành công !!!');
    }

    public function create(){
        $khoa = Khoa::all();
         $last=Lop::orderBy('maLop', 'desc')->first()->maLop+1;
        return view('admin.lop.them',['last'=>$last,'khoa'=>$khoa]);
    }
     public function store(Request $req){
        
        $this->validate($req, 
                [
                    'tenLop' => 'required|max:100|unique:Lop'
                ],
                [
                    'tenLop.unique' =>'Tên Lớp đã tồn tại',
                    'tenLop.unique.required' =>'Bạn chưa nhập tên lớp  ',
                    'tenLop.max'=>'Tên Lớp  phải có độ dài nhỏ hơn 100 kí tự '
                ]
            );
 
        $lop = new Lop;
         $lop->tenLop= $req->tenLop;
         $lop->maKhoa=$req->maKhoa;
       $lop->save();
        return redirect('lop/them')->with(['thongbao'=>'Bạn đã thêm thành công !']);
    }
    public function edit($maLop){
         $khoa = Khoa::all();
        $lop = Lop::find($maLop);
        return view('admin.lop.sua')->with(['lop'=>$lop,'khoa'=>$khoa]);
    }
    public function update(Request $req,$maLop){
        $lop = Lop::find($maLop);
        if($lop->tenLop!=$req->tenLop){
             $this->validate($req, 
                [
                    'tenLop' => 'required|max:100|unique:Lop'
                ],
                [
                    'tenLop.unique' =>'Tên Lớp đã tồn tại',
                    'tenLop.unique.required' =>'Bạn chưa nhập tên lớp  ',
                    'tenLop.max'=>'Tên Lớp  phải có độ dài nhỏ hơn 100 kí tự '
                ]
            );
        }
         $lop->tenLop = $req->tenLop;
         $lop->maKhoa = $req->maKhoa;
         $lop->save();
         return redirect('lop/sua/'.$maLop)->with('thongbao','Sửa thành công !');
    }
}
