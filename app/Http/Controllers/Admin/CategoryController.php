<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    // 分类列表
    public function index(Category $category)
    {
        $categories = $category->orderBy('sort', 'desc')->paginate(20);
        return view('admin.categories.list', compact('categories'));
    }

    // 创建分类
    public function create()
    {
        return view('admin.categories.create_and_edit');
    }

    // 保存分类
    public function store(CategoryRequest $request,Category $category)
    {
        $category->fill($request->all());
        if ($category->save()){
            return $this->success('创建分类成功', route('category.index'));
        }
        return $this->fail('数据库保存失败');
    }

    // 编辑分类
    public function edit(Category $category)
    {
        return view('admin.categories.create_and_edit', compact('category'));
    }

    // 更新分类
    public function update(CategoryRequest $request,Category $category)
    {
        if ($category->update($request->all())){
            return $this->success('修改分类成功', route('category.index'));
        }
        return $this->fail('数据库保存失败');
    }

    // 删除分类
    public function destroy(Category $category)
    {
        if ($category->delete()){
            return $this->success('删除分类成功', route('category.index'));
        }
        return $this->fail('数据删除失败');
    }
}
