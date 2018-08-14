<?php

namespace App\Http\Requests;

class TagRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $tag = $this->route('tag');
        if (is_null($tag)){
            return [
                'name' => 'required|min:2|max:20|unique:tags',
            ];
        } else {
            return [
                'name' => 'required|min:2|max:20|unique:tags,name,'.$tag->id,
            ];
        }
    }
}
