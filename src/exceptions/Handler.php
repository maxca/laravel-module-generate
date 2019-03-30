<?php

namespace Samark\ModuleGenerate\Exceptions;

use App\Exceptions\ValidationException as ValidationFormRequestException;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
#use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class Handler
 * @package Samark\ModuleGenerate\Exceptions
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];


    /**
     * @param \Exception $exception
     * @return mixed|void
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->isJson()) {
            return $this->reportJson($exception);
        }
        return parent::render($request, $exception);
    }

    /**
     * @param \Exception $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function reportJson(Exception $exception)
    {
        if ($exception instanceof ValidationFormRequestException) {
            $code     = 422;
            $response = [
                'errors' => [
                    'status_code' => $code,
                    'message'     => 'The given data was invalid.',
                    'errors'      => $exception->getResponse()
                ]
            ];
        } elseif ($exception instanceof \Illuminate\Validation\UnauthorizedException) {
            $code     = 403;
            $response = [
                'errors' => [
                    'status_code' => $code,
                    'message'     => 'Unauthorized',
                ]
            ];
        } elseif ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            $code     = 404;
            $response = [
                'errors' => [
                    'status_code' => $code,
                    'message'     => 'Page not Found',
                ]
            ];
        } elseif ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            $code     = 404;
            $response = [
                'errors' => [
                    'status_code' => $code,
                    'message'     => 'Not Found',
                ]
            ];

        } elseif ($exception instanceof \Illuminate\Database\QueryException) {
            $code      = 500;
            $message   = 'Internal Server Error';
            $statement = substr(strtolower(trim($exception->getSql())), 0, 6);
            if (in_array($statement, ['insert', 'update'])) {
                $code    = 417;
                $message = 'Expectation Field';
            }
            $response = [
                'errors' => [
                    'status_code' => $code,
                    'message'     => $message,
                ]
            ];
        } elseif ($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
            $code     = 405;
            $response = [
                'errors' => [
                    'status_code' => $code,
                    'message'     => 'Method not Allowed',
                ]
            ];
        } elseif ($exception instanceof InsertException || $exception instanceof UpdateException) {
            $code     = 417;
            $response = [
                'errors' => [
                    'status_code' => $code,
                    'message'     => $exception->getMessage(),
                ]
            ];
        } else {
            $code     = 400;
            $response = [
                'errors' => [
                    'status_code' => $code,
                    'message'     => $exception->getMessage(),
                ]
            ];
        }
        if (config('app.debug') === true) {
            $response['exception'] = [
                'code'    => $exception->getCode(),
                'message' => $exception->getMessage(),
                'file'    => $exception->getFile(),
                'line'    => $exception->getLine(),
                'trace'   => $exception->getTraceAsString(),
            ];
        }

        return response()->json($response, $code);
    }
}
