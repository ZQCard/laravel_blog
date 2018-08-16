<?php

namespace App\Models\Traits;

trait JsonResponse{
    public function success($message = '操作成功', $url = '', $data = [])
    {
        return response()->json([
            'status'    => true,
            'url'       => $url,
            'message'   => $message,
            'data'      => $data
        ]);
    }

    public function fail($message = '操作失败', $url = '')
    {
        return response()->json([
            'status'    => false,
            'url'       => $url,
            'message'   => $message
        ]);
    }
}