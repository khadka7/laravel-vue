<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * @param Exception $exception
     * @return mixed|void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Exception $exception
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        if($request->expectsJson()){
            if($exception instanceof ModelNotFoundException){
               return new JsonResponse([
                    'errors'=>'Model Not Found'
                ],Response::HTTP_NOT_FOUND);
            }
            if($exception instanceof NotFoundHttpException){
                return new JsonResponse([
                    'errors'=>'Http Not Found'
                ],Response::HTTP_NOT_FOUND);
            }

        }
        return parent::render($request, $exception);
    }

    /**
     * @param $message
     * @param $httpStatus
     */
    public function ResponseMsg($message,$httpStatus){
         new JsonResponse([
            'errors'=>$message
        ],$httpStatus);

    }
}

