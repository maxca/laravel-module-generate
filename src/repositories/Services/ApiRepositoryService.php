<?php

namespace Samark\ModuleGenerate\Repositories\Services;

use Samark\ModuleGenerate\Contracts\ResponseTrait;
use League\Fractal\Manager;

/**
 * Class ApiRepositoryService
 * @package App\Repositories\Services
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ApiRepositoryService implements ApiRepositoryServiceInterface
{
    use ResponseTrait;

    /**
     * @var set $eloquent
     */
    protected $eloquent;

    /**
     * @var  set $transformer
     */
    protected $transformer;

    /**
     * ApiRepositoryService constructor.
     */
    public function __construct()
    {
        $fractal = new Manager();
        $this->setFractal($fractal);
        if (isset($_GET['include'])) {
            $fractal->parseIncludes($_GET['include']);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->eloquent->paginate();
        return $this->respondWithCollection($data, $this->transformer);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail($id)
    {
        $data = $this->eloquent->find($id);
        return $this->respondWithItem($data, $this->transformer);
    }

    /**
     * @param array $params
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($params = array())
    {
        $data = $this->eloquent->create($params);
        return $this->setStatusCode(201)
            ->respondWithItem($data, $this->transformer);
    }

    /**
     * @param $id
     * @param array $params
     * @return mixed
     */
    public function update($id, $params = array())
    {
        $data = $this->eloquent->update($params, $id);
        return $this->respondWithItem($data, $this->transformer);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $this->eloquent->delete($id);
        return $this->responseDeleteSuccess();
    }


}