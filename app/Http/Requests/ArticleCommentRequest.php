<?php

namespace App\Http\Requests;

class ArticleCommentRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content'         => 'required',
            'article_id'   => 'required|exists:articles,id',
            'user_id'   => 'required|exists:users,id',
            'parent_id'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'article_id.exists' => '文章不存在',
            'user_id.exists' => '用户不存在',
        ];
    }
}
