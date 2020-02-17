<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khoa;
class KhoaController extends Controller
{
    public function index(){
    		$data = Khoa::all();
    		return view('admin.khoa.danhsach',['khoa'=>$data]);
    }
    public function destroy($maKhoa){
    	$khoa = Khoa::find($maKhoa);
    	$khoa->delete();
    	return redirect('khoa/danhsach')->with('thongbao','Xóa thành công !!!');
    }
    public function create(){
    	 $last=Khoa::orderBy('maKhoa', 'desc')->first()->maKhoa+1;
    	return view('admin.khoa.them',['last'=>$last]);
    }

    public function store(Request $req){
    	
    	$this->validate($req, 
    			[
    				'tenKhoa' => 'required|min:3|max:100|unique:Khoa'
    			],
    			[
                    'tenKhoa.unique' =>'Tên Khoa đã tồn tại',
    				'tenKhoa.required' =>'Bạn chưa nhập tên khoa  ',
    				'tenKhoa.min'=>'Tên khoa phải có độ dài lớn hơn 3 kí tự ',
    				'tenKhoa.max'=>'Tên khoa  phải có độ dài nhỏ hơn 100 kí tự '
    			]
    		);
 
    	$khoa = new Khoa;
    	 $khoa->tenKhoa= $req->tenKhoa;
    	$khoa->save();
    	 return redirect('khoa/them')->with(['thongbao'=>'Bạn đã thêm thành công !']);
    }
    public function edit($maKhoa){
        $khoa= Khoa::find($maKhoa);
        return view('admin.khoa.sua',['khoa'=>$khoa]);
    }
    public function update(Request $req,$maKhoa){
        $khoa = Khoa::find($maKhoa);
        $this->validate($req, 
                [
                    'tenKhoa' => 'required|min:3|max:100|unique:Khoa'
                ],
                [
                    'tenKhoa.unique' =>'Tên Khoa đã tồn tại',
                    'tenKhoa.required' =>'Bạn chưa nhập tên khoa  ',
                    'tenKhoa.min'=>'Tên khoa phải có độ dài lớn hơn 3 kí tự ',
                    'tenKhoa.max'=>'Tên khoa  phải có độ dài nhỏ hơn 100 kí tự '
                ]
            );
        $khoa->tenKhoa=$req->tenKhoa;
       $khoa->save();
         return redirect('khoa/sua/'.$maKhoa)->with(['thongbao'=>'Bạn đã sửa thành công !']);

    }
}
