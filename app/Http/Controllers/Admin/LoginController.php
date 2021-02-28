<?php
// 后台登录控制器
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    //登录显示
    public function index()
    {
        echo 111;
        if (auth()->check()) {

            // 跳转到后台首页
            return redirect(route('admin.index'));
        }

        return view('admin.login.login');
    }

    // 登录处理
    public function login(Request $request)
    {
        $post = $this->validate(
            $request,
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        // 登录，使用auth方法来登录的话，账号和密码的字段名一定要用username和password
        $bool = auth()->attempt($post);
        // 判断是否登录成功
        if ($bool) {
            // auth()->user() 返回房钱登录的用户模型对象，存储在session中
            // laravel默认session是存储到文件中，
            //  $model = auth()->user();
            //  dd($model->toArray());
            // 跳转到后台首页
            return redirect(route('admin.index'));
        }
        // withErrors 把信息写入到验证错误提示中  特殊的session laravel中叫闪存
        // 闪存 从设置好之后没只能在第一个http请求中获取到数据，以后就没有了
        return redirect(route('admin.login'))->withErrors(['error' => '登录失败,请检查用户名和密码']);
    }

    // 退出
    public function logout(){
        auth()->logout();
        return redirect(route('admin.login'))->with('success','退出成功，请重新登录');
    }
}
