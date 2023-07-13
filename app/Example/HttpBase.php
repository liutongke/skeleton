<?php

namespace App\Example;

use Sapi\Api;

class HttpBase extends Api
{
    //用户权限验证
    public function userCheck(\Swoole\Http\Request $request): string
    {
        if ($request->header["x-token"] != "123123") {
            return "token过期";
        }
        return "";
    }
}