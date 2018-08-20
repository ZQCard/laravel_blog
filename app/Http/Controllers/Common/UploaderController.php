<?php

namespace App\Http\Controllers\Common;

use App\Handlers\DocumentUploadHandler;
use App\Models\Traits\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploaderController extends Controller
{
    use JsonResponse;

    public function upload(Request $request,DocumentUploadHandler $uploadHandler)
    {
        // 获取文件对象数组
        $file = $request->file();
        if ($request->hasFile('file')){
            // 获取当前文件对象
            $uploadedFile = $file['file'];
            $result = $uploadHandler->save($uploadedFile, $request->post('type'), 'admin',\Auth::id());
            if ($result['status']){
                // 如果是编辑器上传
                if ($request->post('editor')){
                    return response()->json(['file_path' => $result['url']]);
                }
                return $this->success($result['message'], '', $result);
            }
            return $this->fail($result['message']);
        }
        return $this->fail('非法文件');
    }
}
