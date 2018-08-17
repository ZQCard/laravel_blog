<?php

namespace App\Handlers;

use App\Models\File;
use Illuminate\Http\UploadedFile;

class DocumentUploadHandler
{
    protected $allowed_extension = [
        'image' => ['png', 'jpg', 'gif', 'jpeg']
    ];

    public function save(UploadedFile $file, $type, $end, $prefix)
    {
        $returnData = [
            'status'  => 'true',
            'message' => '上传成功',
            'url'     => '',
        ];

        // 获取临时文件地址,并生成散列码,检测文件是否存在
        $hash_key = md5_file($file->getRealPath());
        $check_file = $this->check_file($hash_key);
        if (is_string($check_file)){
            $returnData['url'] = $check_file;
            return $returnData;
        }

        // 获取后缀
        $extension = $file->getClientOriginalExtension();
        // 筛选不合法的文件
        if (!isset($this->allowed_extension[$type]))return false;
        if (!in_array($extension, $this->allowed_extension[$type]))return false;
        // 存储文件夹路径
        $folder_name = 'storage/uploads/' . $type . '/' .$end . '/' . date('y-m-d', time());
        $upload_path = public_path() . '/' . $folder_name;
        // 生成文件名
        $filename = $prefix . '_' .time() . '_' . str_random(10) . '.' . $extension;
        // 将文件从移动到指定文件夹并命名
        $file->move($upload_path, $filename);

        // 新文件存储到文件表
        $fileModel = new File();
        $fileModel->hash_key = $hash_key;
        $fileModel->original_name = $file->getClientOriginalName();
        $fileModel->real_name = $filename;
        $fileModel->extension = $extension;
        $fileModel->mime_type = $file->getClientMimeType();
        $fileModel->size = $file->getClientSize();
        $fileModel->path = $folder_name;
        // 保存文件
        if ($fileModel->save()){
            $returnData['url'] = config('app.url') . "/" .$folder_name . '/' .$filename;
            return $returnData;
        }
        // 保存失败
        $returnData['status'] = false;
        $returnData['message'] = '数据保存失败';
        return $returnData;
    }

    private function check_file($hash_key){
        $file = File::findByKey($hash_key);
        if (is_null($file)) {
            return true;
        }
        return config('app.url') . "/" . $file->path . '/' .$file->real_name;
    }
}