<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
class SocialController extends Controller
{
	public function redirect($provider)
	{
		return Socialite::driver($provider)->redirect();
	}

	public function callback($provider)
	{

		$getInfo = Socialite::driver($provider)->user();
		$usertest = User::where('email', $getInfo->email)->first();
		if(!$usertest){
			$user = $this->createUser($getInfo,$provider);
		}else{
			$user = $usertest;
		}
		
		auth()->login($user);
		return redirect()->to('thongke');
		

	}
	function createUser($getInfo,$provider){

		$user = User::where('provider_id', $getInfo->id)->first();
		
		if (!$user) {
			$user = User::create([
				'name'     => $getInfo->name,
				'email'    => $getInfo->email,
				'provider' => $provider,
				'provider_id' => $getInfo->id
			]);
		}

		return $user;
	}
	function logout(){
		 Auth::logout();
     	 return redirect('login');
	}
	function login(Request $req){
			
		 $this->validate($req,[
        'email'=>'required',
        'password'=>'required'
         ],[
        'email.required' =>'Bạn chưa nhập tên người dùng',
         'password.required' =>'Bạn chưa nhập password',
         ]);

          if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])){
             return redirect("thongke");
          }else
          return redirect("login")->with('thongbao','Thông tin tài khoản không chính xác');
	}
	function create(){
		return view('register');
	}
	function register(Request $request){
		//dd($request->all());
		 $this->validate($request,[
            'name' =>'required',
            'email' =>'required|email|unique:users,email',
            'password' =>'required|min:3|max:100',
            'password2' =>'required|same:password'
        ],[

            'name.required' =>'Bạn chưa nhập tên người dùng',
            'name.min' =>'Tên người dùng có ít nhất 3 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email' =>'Bạn chưa nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại ',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 3 ký tự',
            'password.max'=>'Mật khẩu có nhiều nhất 100 ký tự',
            'password2.required'=>'Bạn chưa nhập lại mật khẩu',
            'password2.same'=>'Mật khẩu nhập lại không đúng !'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user ->password = bcrypt($request->password);
        $user->save();
        return redirect('register')->with('thongbao','Đăng ký thành công !');
	}
	function index(){
		return view('login');
	}
}