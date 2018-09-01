<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends BaseController
{
    // 标签列表
    public function index(Request $request, Tag $tag)
    {
        $tags = $tag->withOrder($request->order)->paginate(20);
        return view('admin.tags.list', compact('tags'));
    }

    // 创建标签
    public function create()
    {
        return view('admin.tags.create_and_edit');
    }

    // 保存标签
    public function store(TagRequest $request,Tag $tag)
    {
        $tag->fill($request->all());
        if ($tag->save()){
            return $this->success('创建标签成功', route('tag.index'));
        }
        return $this->fail('数据库保存失败');
    }

    // 编辑标签
    public function edit(Tag $tag)
    {
        return view('admin.tags.create_and_edit', compact('tag'));
    }

    // 更新标签
    public function update(TagRequest $request,Tag $tag)
    {
        if ($tag->update($request->all())){
            return $this->success('修改标签成功', route('tag.index'));
        }
        return $this->fail('数据库保存失败');
    }

    // 删除标签
    public function destroy(Tag $tag)
    {
        if ($tag->delete()){
            return $this->success('删除标签成功', route('tag.index'));
        }
        return $this->fail('数据删除失败');
    }
}
