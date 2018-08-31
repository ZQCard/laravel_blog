<?php

namespace App\Http\Controllers\Admin;

class PersonController extends AdminController
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
            return view('admin.person.create_and_edit', compact('about'));
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
}
