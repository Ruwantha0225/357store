<?php

namespace App\Exceptions;

use Exception;
use Request;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Response;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }
    public function nunauthenticated($request, AuthenticationException $exception) {
        if($request->expectsJson()) {
            return response()->json(['error'=>'Unauthenticated.'], 401);
        }

        $guard = array_get($exception->guards(), 0);

        switch($guard) {
            case 'admin':
                $login = 'admin.login';
                break;
            default:
                $login = 'login';
                break;
        }
        
        return redirect()->guest(route($login));
    }
}
