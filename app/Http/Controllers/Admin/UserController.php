<?php
// 后台用户管理
namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    //
    public function index()
    {

        // 分页
        $users = User::paginate($this->pagesize);

        return view('admin.user.index', compact('users'));
    }

    // 添加显示
    public function create()
    {
        return view('admin.user.create');
    }

    // 用户添加逻辑
    public function store(Request $request)
    {
        dd($request->all());
        $data = $this->validate(
            $request,
            [
                'username' => 'required',
                'truename' => 'required',
                'password' => 'required|comfirmed'
        ]);

    }

    // 测试集成VUE
    public function testAxios(Request $request){
        $userInfo = User::paginate(10);
        return json_encode($userInfo);
    }
}
