<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths 视图存储路径
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    | 大多数模板系统从磁盘加载模板。 在这里你可以指定一个可以检查你的视图的路径数组。 
    | 当然，通常Laravel已经为您注册了视图路径。
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path 编译视图路径
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    | 该选项确定所有已编译 Blade 模板的存储位置。 
    | 通常，这在存储目录内。 但是，像平常一样，你可以自由改变这个值。
    |
    */

    'compiled' => realpath(storage_path('framework/views')),

];
