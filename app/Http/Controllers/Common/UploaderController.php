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
        $file = $request->file();
        if ($request->hasFile('file')){
            $uploadedFile = $file['file'];
            $result = $uploadHandler->save($uploadedFile, $request->post('type'), 'admin',\Auth::id());
            return $this->success('上传成功', '', $result);
        }
        return $this->fail('上传失败');
    }
}
