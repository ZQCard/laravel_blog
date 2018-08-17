<?php

namespace App\Http\Requests;

class ArticleRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|min:2|max:50',
            'category_id'   => 'required',
            'content'       => 'required',
            'poster'        => 'required|url',
        ];
    }
}
