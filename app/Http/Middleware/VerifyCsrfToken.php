<?php
//++++++++++++++++++++++++++++++++
//csrf 保护，简称跨站请求伪造
//在 routes/web.php 路由文件中所有请求方式为 PUT、POST 或 DELETE 的路由对应的 HTML
//表单都必须包含一个 CSRF 令牌字段( {{csrf_field()}} )，否则，请求会被拒绝
//++++++++++++++++++++++++++++++++
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     * 排除检查 路由
     * @var array
     */
    protected $except = [
        //
    ];
}
