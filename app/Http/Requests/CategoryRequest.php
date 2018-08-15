<?php

namespace App\Http\Requests;

class CategoryRequest extends Request
{
    public function rules()
    {
        $category = $this->route('tag');
        if (is_null($category)){
            return [
                'name' => 'required|min:2|max:20|unique:tags',
            ];
        } else {
            return [
                'name' => 'required|min:2|max:20|unique:tags,name,'.$category->id,
            ];
        }
    }
}
