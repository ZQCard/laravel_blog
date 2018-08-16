<?php

namespace App\Http\Controllers\Admin;

use App\Models\Traits\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    use JsonResponse;
    protected $ajaxReturnData = ['url' => '', 'message' => '操作成功'];

    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function home()
    {
        return view('admin.index');
    }
}
