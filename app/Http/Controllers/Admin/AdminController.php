<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $ajaxReturnData = ['url' => '', 'message' => '操作成功'];

    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function home()
    {
        return view('admin.index');
    }

    public function success($message = '操作成功', $url = '')
    {
        return response()->json([
            'status'    => true,
            'url'       => $url,
            'message'   => $message
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
