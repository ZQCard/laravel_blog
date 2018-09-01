<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FriendLinkRequest;
use App\Models\FriendLink;
use Illuminate\Http\Request;

class FriendLinkController extends BaseController
{
    // 友情链接列表
    public function index(FriendLink $friendLink)
    {
        $friendLinks = $friendLink->paginate(20);
        return view('admin.friend_links.list', compact('friendLinks'));
    }

    // 创建友情链接
    public function create()
    {
        return view('admin.friend_links.create_and_edit');
    }

    // 保存友情链接
    public function store(FriendLinkRequest $request,FriendLink $friendLink)
    {
        $friendLink->fill($request->all());
        if ($friendLink->save()){
            return $this->success('创建友情链接成功', route('friend_link.index'));
        }
        return $this->fail('数据库保存失败');
    }

    // 编辑友情链接
    public function edit(FriendLink $friendLink)
    {
        return view('admin.friend_links.create_and_edit', compact('friendLink'));
    }

    // 更新友情链接
    public function update(FriendLinkRequest $request,FriendLink $friendLink)
    {
        if ($friendLink->update($request->all())){
            return $this->success('修改友情链接成功', route('friend_link.index'));
        }
        return $this->fail('数据库保存失败');
    }

    // 开启/关闭友情链接
    public function patch(Request $request)
    {
        $data = $request->all();
        if (($data['is_show'] != 1) && ($data['is_show'] != 0)){
            return $this->fail('非法数据');
        }
        $res = FriendLink::where(['id' => (integer)$data['id']])->update(['is_show' => (integer)$data['is_show']]);
        if($res){
            return $this->success('友情链接更新成功');
        }
        return $this->fail('友情链接更新失败');
    }
    
    // 删除友情链接
    public function destroy(FriendLink $friendLink)
    {
        if ($friendLink->delete()){
            return $this->success('删除友情链接成功', route('friend_link.index'));
        }
        return $this->fail('数据删除失败');
    }
}
