<?php
/*
 |-------------------------------------
 |  登陆注册
 |-------------------------------------
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    /**
     * 登陆
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function login()
    {
        try {
            if($input=Input::all())
            {
              $rules=
              [
                'email'=>'required|email',
                'password'=>'required'
              ];
              $messages=
              [
                  'email.required'=>'email不能为空',
                  'email.email'=>'email格式不正确',
                  'password.required'=>'密码不能为空'
              ];
              $validator=Validator::make($input, $rules,$messages);
              //表单验证
//               $validator->fails()  验证都符合规则返回false 不符合规则返回true
              if($validator->passes())
              {
                  $user=DB::table('user')->where('email',$input['email'])->first(['id','email','name']);
                  if(!$user)
                  {
                      return back()->with('msg','用户不存在');
                  }
                  if($input['password']!='123456'){//这里做个假登陆
                      return back()->with('msg','密码不正确');
                  }
                  session(['user'=>$user]);//将用户信息保存到session当中
                  return redirect('/');
              }else{
                  return back()->withErrors($validator);
              }
            }
            $title = '登陆';
            return view('login',compact('title'));
        }catch (\Exception $e){
            //dd($e);
            $title = '404';
            return view('404',compact('title'));
        }
    }
    
    
    function logout(){
        session()->forget('user');
        return redirect('login');
    }
}
