<?php

namespace App\Http\Requests;

class FriendLinkRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $friendLink = $this->route('friend_link');
        if (is_null($friendLink)){
            return [
                'name' => 'required|min:2|max:20|unique:friend_links',
                'link' => 'required|active_url|max:50|unique:friend_links,link',
            ];
        } else {
            return [
                'name' => 'required|min:2|max:20|unique:friend_links,name,'.$friendLink->id,
                'link' => 'required|active_url|max:50|unique:friend_links,link,'.$friendLink->id,
            ];
        }
    }

    public function messages()
    {
        return [
            'link.unique' => '链接已存在'
        ];
    }
}
