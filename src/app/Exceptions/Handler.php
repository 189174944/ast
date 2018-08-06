<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        if ($exception instanceof ApiException) {
            throw new ApiException($exception->getCode());
//            throw new ApiException($exception->getMessage(),$exception->getCode());
        }
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ApiException) {
            $code = $exception->getCode();
            $result = [
                "msg" => $exception->getMessage(),
                "data" => $request->all(),
                "code" => $exception->getCode(),
                "trace" => $exception->getTraceAsString(),
                "line" => $exception->getLine()
            ];
            if ($code>=10000&&$code<50000){
                Log::emergency(json_encode($result));
            }
            return response()->json($result);
        }
        return parent::render($request, $exception);
    }
}
