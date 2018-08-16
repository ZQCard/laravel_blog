<?php

namespace App\Handlers;

use Illuminate\Http\UploadedFile;

class DocumentUploadHandler
{
    protected $allowed_extension = [
        'image' => ['png', 'jpg', 'gif', 'jpeg']
    ];

    public function save(UploadedFile $file, $type, $end, $prefix)
    {
        $extension = $file->getClientOriginalExtension();
        if (!isset($this->allowed_extension[$type]))return false;
        if (!in_array($extension, $this->allowed_extension[$type]))return false;

        $folder_name = 'uploads/' . $type . '/' .$end . '/' . date('y-m-d', time());
        $upload_path = public_path() . '/' . $folder_name;
        $filename = $prefix . '_' .time() . '_' . str_random(10) . '.' . $extension;
        $file->move($upload_path, $filename);
        return [
            'url' => config('app.url') . "/" .$folder_name . '/' .$filename
        ];
    }
}