<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::get('404',function(){
	return view('404');
});

Route::get('test',function(){
	
	$lop = App\Khoa::find(100);
	$khoa = $lop->sinhvien;
	//var_dump($khoa->tenSV);
	foreach ($khoa as $comment) {
    	var_dump($comment->tenSV) ;
	}
});
Route::get('sv',function(){
	$data = DB::table('sinhvien')->count();
	echo $data;
	//foreach ($data as $user) {
    //echo print_r($data);
//}
});
*/



Route::get('/','SocialController@index');
Route::get('login','SocialController@index');
Route::get('redirect/{provider}', 'SocialController@redirect');
Route::get('callback/{provider}', 'SocialController@callback');
Route::post('login','SocialController@login')->name('login');
Route::get('register','SocialController@create');
Route::post('register','SocialController@register')->name('register');
Route::group(['middleware'=>'AdminLogin'],function(){	
	Route::get('/', 'ThongKe@index');
	Route::get('logout','SocialController@logout');
	Route::get('thongke','ThongKe@index')->name('thongke');
	Route::group(['prefix'=>'sinhvien'],function(){
		Route::get('/','SinhVienController@index');
		Route::get('danhsach','SinhVienController@index')->name('sv.index');
		Route::get('xoa/{id}','SinhVienController@destroy');
		Route::get('them','SinhVienController@create');
		Route::post('them','SinhVienController@store');
		Route::get('sua/{maSV}','SinhVienController@edit');
		Route::post('sua/{maSV}','SinhVienController@update');
	});
	Route::group(['prefix'=>'monhoc'],function(){
		Route::get('/','MonHocController@index');
		Route::get('danhsach','MonHocController@index')->name('mon.index');
		Route::get('xoa/{id}','MonHocController@destroy');
		Route::get('them','MonHocController@create');
		Route::post('them','MonHocController@store');
		Route::get('sua/{maMon}','MonHocController@edit');
		Route::post('sua/{maMon}','MonHocController@update');
	});
	Route::group(['prefix'=>'khoa'],function(){
		Route::get('/','KhoaController@index')->name('khoa');
		Route::get('danhsach','KhoaController@index')->name('khoa.index');
		Route::get('xoa/{maKhoa}','KhoaController@destroy')->name('khoa.delete');
		Route::get('them','KhoaController@create')->name('khoa.create');
		Route::post('them','KhoaController@store')->name('khoa.store');
		Route::get('sua/{maKhoa}','KhoaController@edit')->name('khoa.edit');
		Route::post('sua/{maKhoa}','KhoaController@update')->name('khoa.update');
	});
	Route::group(['prefix'=>'lop'],function(){
		Route::get('/','LopController@index');
		Route::get('danhsach','LopController@index')->name('lop.index');
		Route::get('xoa/{id}','LopController@destroy');
		Route::get('them','LopController@create');
		Route::post('them','LopController@store');
		Route::get('sua/{maLop}','LopController@edit');
		Route::post('sua/{maLop}','LopController@update');
	});
	Route::group(['prefix'=>'diem'],function(){
		Route::get('/','DiemController@index');
		Route::get('danhsach','DiemController@index')->name('diem.index');
		Route::get('xoa/{id}','DiemController@destroy');
		Route::get('them','DiemController@create');
		Route::post('them','DiemController@store');
		Route::get('sua/{id}','DiemController@edit');
		Route::post('sua/{id}','DiemController@update');
	});
});
