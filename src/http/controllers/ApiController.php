<?php

namespace Samark\ModuleGenerate\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Samark\ModuleGenerate\Contracts\ResponseTrait;
use League\Fractal\Manager;
use Illuminate\Http\Response;

/**
 * Class ApiController
 * @package App\Http\Controllers
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ApiController extends BaseController
{
    use ResponseTrait;

    /**
     * ApiController constructor.
     * @param \League\Fractal\Manager|null $fractal
     */
    public function __construct(Manager $fractal = null)
    {
        $fractal = $fractal === null ? new Manager() : $fractal;
        $this->setFractal($fractal);

        if (isset($_GET['include'])) {
            $fractal->parseIncludes($_GET['include']);
        }
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $resource
     * @return mixed
     */
    public function respondWithSuccess($resource = [])
    {
        return $this->respond($resource);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'errors' => [
                'status_code' => $this->getStatusCode(),
                'errors'      => $message
            ]
        ]);
    }

    /**
     * @return mixed
     * @param $message
     */
    public function respondUnauthorized($message = 'The requested resource failed authorization')
    {
        return $this->setStatusCode(Response::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'The requested resource could not be found')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = 'An internal server error has occurred')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondUnprocessableEntity($message = 'The request cannot be processed with the given parameters')
    {
        return $this->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }

    /**
     * @param array $resource
     * @return mixed
     */
    public function respondCreated($resource = [])
    {
        return $this->setStatusCode(Response::HTTP_CREATED)->respondWithSuccess($resource);
    }

    /**
     * @param array $resource
     * @return mixed
     */
    public function respondUpdated($resource = [])
    {
        return $this->setStatusCode(Response::HTTP_OK)->respondWithSuccess($resource);
    }

    /**
     * @return mixed
     */
    public function respondNoContent()
    {
        return $this->setStatusCode(Response::HTTP_NO_CONTENT)->respondWithSuccess();
    }

    /**
     * @param null $message
     * @return mixed
     */
    public function respondHttpConflict($message = null)
    {
        return $this->setStatusCode(Response::HTTP_CONFLICT)->respondWithError($message);
    }
}


