<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ApiException extends Exception
{
    protected $message;
    protected $code;

    /**
     * 按接口的重要程度将返回码分为8个等级
     * 10000-19999 表示紧急状况 比如系统挂掉(系统记录)
     * 20000-29999 表示比如 需要立即采取行动的问题，比如整站宕掉，数据库异常等，这种状况应该通过短信提醒(系统记录)
     * 30000-39999 表示严重问题，比如：应用组件无效，意料之外的异常(系统记录)
     * 40000-49999 表示运行时错误，不需要立即处理但需要被记录和监控(系统记录)
     * 50000-59999 表示警告但不是错误，比如使用了被废弃的API(系统不记录)
     * 60000-69999 表示普通但值得注意的事件(系统不记录)
     * 70000-79999 表示感兴趣的事件，比如登录、退出(系统不记录)
     * 80000-89999 表示详细的调试信息(系统不记录)
     */
//Log::emergency($error);     // 1 紧急状况，比如系统挂掉
//Log::alert($error);     // 2 需要立即采取行动的问题，比如整站宕掉，数据库异常等，这种状况应该通过短信提醒
//Log::critical($error);     // 3 严重问题，比如：应用组件无效，意料之外的异常
//Log::error($error);     // 4 运行时错误，不需要立即处理但需要被记录和监控
//Log::warning($error);    // 5 警告但不是错误，比如使用了被废弃的API
//Log::notice($error);     // 6 普通但值得注意的事件
//Log::info($error);     // 7 感兴趣的事件，比如登录、退出
//Log::debug($error);     // 8 详细的调试信息
    protected $codeMap = [];



    public function __construct(int $code = 0, Throwable $previous = null)
    {
        $this->codeMap = config('api.codemap');
        $this->code = $code;
//        $this->message = $message;
        $this->message = $this->codeMap[$code];
    }

//    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
//    {
//        $this->code  = $code;
////        $this->message = $message;
//        $this->message = $this->resultMap[$code];
//    }
}
