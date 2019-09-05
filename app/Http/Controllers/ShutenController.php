<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ShutenController extends Controller
{
    public function index(Request $request){
    	$redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        $num = $redis->get('num');
        echo "访问次数:".$num;
    	$req=$request->all();
    	// dd($req);
    	$search="";
    	if (!empty($req['search'])) {
    		// var_dump($req);
    		$search=$req['search'];
    		$data=DB::table("shuten")->where('name','like','%'.$req['search'].'%')->paginate(2);

    	}else{
    		$data=DB::table("shuten")->paginate(2);

    	}
		
		return view('shutenList',['shuten'=>$data,'search'=>$search]);
	}
	public function update(Request $request){
		$req=$request->all();
		$data=DB::table('shuten')->where(['id'=>$req['id']])->first();
		return view('shutenUpdate',['shuten_info'=>$data]);
	}
	public function doupdate(Request $request){

		$req=$request->all();
		$res=DB::table('shuten')->where(['id'=>$req['id']])->update([
			'name'=>$req['name']
		]);
		if ($res) {
			return redirect("/shuten/index");
		}else{
			echo "fail";
		}
	}
	public function delete(Request $request){
		$req=$request->all();
		$res=DB::table('shuten')->where(['id'=>$req['id']])->delete();
		if ($res) {
			return redirect("/shuten/index");
		}
	}

	public function add(){
			return view('shutenAdd',[]);

	}
	public function doadd(Request $request){
		
		 $validated = $request->validate([
		 		'name'=>'required'
		 	],[
		 		'name.required'=>"字段必填"
		 ]);
		$req=$request->all();
		$res=DB::table('shuten')->insert([
			 'name'=>$req['name']
		]);
		if ($res) {
			return redirect("/shuten/index");
		}else{
			echo "fail";
		}
	}
	public function logi(){
		return view('shutenLogi',[]);
	}
	public function doabb(){
		echo 1111;die;
	}
     

    public function reg()
    {
    	return view('app/reg');
    }

    public function doreg(Request $request)
    {
      //dd($request->all());
      $username = $request->username;
      $pwd = md5($request->pwd);
      $email = $request->email;
      $data = [
         'name'=>$username,
         'password'=>$pwd,
         'email'=>$email,
         'reg_time'=>time()
      ];
      $first = DB::table('user')->where('name',$username)->first();
      if($first){
           echo "<script>alert('用户名已注册');action.href='/shuten/reg';</script>";
      }else{
      	$res = DB::table('user')->insert($data);
	      if($res){
	          echo "<script>alert('注册成功');action.href='/shuten/login';</script>";
	      }else{
	          echo "<script>alert('注册失败');action.href='/shuten/reg';</script>";
	      }
      }
      

    }

    public function login()
    {
    	return view('app/login');
    }
    public function dologin(Request $request)
    {
    	 //dd($request->all());
    	 $pwd = $request->pwd;
    	 $username=$request->username;
    	 $where = [
             'password'=>(md5($pwd)),
             'name'=>$username
    	 ];
   
    	 $res = DB::table('user')->where($where)->first();
    
    	 if($res){
               echo "<script>alert('登录成功');action.href='/shuten/index';</script>";
    	 }else{
               echo "<script>alert('用户名密码错误');action.href='/shuten/login';</script>";
    	 }
    }

  	public function file(){
      // echo 1111;die;
      return view('app/shutenfile');
    }
    public function dofile(Request $request){

         // dd($_FILES);
        $path = $request->file('goods_price')->store('goods');
        echo asset('storage').'/'.$path;
    }

}
