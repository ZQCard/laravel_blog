<?php

namespace App\Http\Requests;

class CategoryRequest extends Request
{
    public function rules()
    {
        $category = $this->route('category');
        if (is_null($category)){
            return [
                'name' => 'required|min:2|max:20|unique:categories',
            ];
        } else {
            return [
                'name' => 'required|min:2|max:20|unique:categories,name,'.$category->id,
            ];
        }
    }
}
