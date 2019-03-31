<?php

namespace Samark\ModuleGenerate\Repositories\Services;

/**
 * Interface BackendServiceInterface
 * @package App\Services
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
interface AbstractBackendServiceInterface
{

    /**
     * @param $view
     * @param $needData boolean
     * @return mixed
     */
    public function render($view, $needData = true);

    /**
     * @return mixed
     */
    public function index();

    /**
     * @param $id
     * @return mixed
     */
    public function show($id);

    /**
     * @return mixed
     */
    public function create();

    /**
     * @param $params array
     * @return mixed
     */
    public function store($params);

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id);

    /**
     * @param $id
     * @param $params
     * @return mixed
     */
    public function update($id, $params);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @return mixed
     */
    public function export();

    /**
     * @return mixed
     */
    public function download();
}