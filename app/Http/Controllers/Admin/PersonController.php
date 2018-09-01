<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class PersonController extends BaseController
{
    /**
     * 关于我
     */
    public function about()
    {
        $redis = app('redis.connection');
        if (request()->method() == 'GET'){ // 查看
            $about = json_decode($redis->get('person.about'), true);
            (!isset($about['user'])) && $about['user'] = '';
            (!isset($about['avatar'])) && $about['avatar'] = asset('img/upload.jpg');
            (!isset($about['content'])) && $about['content'] = '';
            return view('admin.person.aboutme_create_and_edit', compact('about'));
        } else { // 修改
            $data = request()->all();
            $about['user'] = $data['user'];
            $about['avatar'] = $data['avatar'];
            $about['content'] = trim($data['content']);
            foreach ($about as $value){
                if (is_null($value)){
                    return $this->fail('数据不得为空');
                }
            }
            $redis->set('person.about',json_encode($about));
            return $this->success('保存成功');
        }
    }

    public function info()
    {
        $admin = Auth::guard('admin')->user();
        if (request()->method() == 'GET'){
            return view('admin.person.admin_edit', compact('admin'));
        } else { // 修改
            $data = request()->all();
            // 修改用户名
            $data['username'] && $admin->username = $data['username'];
            $data['password'] && $admin->password = bcrypt($data['password']);
            $data['email'] && $admin->email = $data['email'];
            if ($admin->save()){
                return $this->success('保存成功');
            }
            return $this->fail('保存失败');
        }
    }
}
