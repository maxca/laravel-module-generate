<?php

namespace Samark\ModuleGenerate\Repositories\Services;

/**
 * Class AbstractBackendService
 * @package App\Services
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
abstract class AbstractBackendService implements AbstractBackendServiceInterface
{
    /**
     * @var array
     */
    protected $views = [];

    /**
     * @var array
     */
    protected $routes = [];

    /**
     * @var array
     */
    protected $columns = [];

    /**
     * @var array
     */
    protected $search = [];

    /**
     * @var
     */
    protected $eloquent;

    /**
     * @var
     */
    protected $transformer;

    /**
     * @var array
     */
    protected $include = [];

    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @var array
     */
    protected $messages = [];

    /**
     * @var array
     */
    protected $actions = [];

    /**
     * @var string
     */
    protected $downloadFilename;

    /**
     * @var string
     */
    protected $containerName;

    /**
     * @param $view
     * @param bool $needData
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string
     * @throws \Throwable
     */
    public function render($view, $needData = true)
    {
        return $needData
            ? view($view, ['module' => $this->containerName])
                ->with(['data' => $this->getEloquent()])
                ->with(['rules' => $this->getRules()])
                ->with(['messages' => $this->getMessages()])
                ->with(['search' => $this->getSearch()])
                ->with(['actions' => $this->getActions()])
                ->with(['columns' => $this->getColumns()])
                ->with(['link_action' => $this->getLinkAction()])
                ->with(['columns_name' => $this->getColumnName()])
                ->render()
            : view($view, ['module' => $this->containerName]);
    }

    /**
     * @return array
     */
    protected function getActions()
    {
        return $this->action;
    }

    /**
     * @param array $actions
     */
    protected function setActions(array $actions): void
    {
        $this->actions = $actions;
    }

    /**
     * @return array
     */
    protected function getRules(): array
    {
        return $this->rules;
    }

    /**
     * @param array $rules
     */
    protected function setRules(array $rules): void
    {
        $this->rules = $rules;
    }

    /**
     * @return array
     */
    protected function getMessages()
    {
        return $this->messages;
    }

    /**
     * @return array
     */
    protected function getViews(): array
    {
        return $this->views;
    }

    /**
     * @param array $views
     */
    protected function setViews(array $views): void
    {
        $this->views = $views;
    }

    /**
     * @return array
     */
    protected function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * @param array $routes
     */
    protected function setRoutes(array $routes): void
    {
        $this->routes = $routes;
    }

    /**
     * @return array
     */
    protected function getColumns()
    {
        return $this->columns;
    }

    /**
     * @param array $columns
     */
    protected function setColumns(array $columns): void
    {
        $this->columns = $columns;
    }

    /**
     * @return array
     */
    protected function getSearch(): array
    {
        return $this->search;
    }

    /**
     * @param array $search
     */
    protected function setSearch(array $search): void
    {
        $this->search = $search;
    }

    /**
     * @return mixed
     */
    protected function getEloquent()
    {
        return $this->eloquent;
    }

    /**
     * @param mixed $eloquent
     */
    protected function setEloquent($eloquent): void
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @return mixed
     */
    protected function getTransformer()
    {
        return $this->transformer;
    }

    /**
     * @param mixed $transformer
     */
    protected function setTransformer($transformer): void
    {
        $this->transformer = $transformer;
    }

    /**
     * @return array
     */
    protected function getInclude(): array
    {
        return $this->include;
    }

    /**
     * @param array $include
     */
    protected function setInclude(array $include): void
    {
        $this->include = $include;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string
     * @throws \Throwable
     */
    public function index()
    {
        return $this->render($this->views['index']);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string
     * @throws \Throwable
     */
    public function show($id)
    {
        return $this->render($this->views['show']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string
     * @throws \Throwable
     */
    public function create()
    {
        return $this->render($this->views['create']);
    }

    /**
     * @param array $params
     * @return mixed|void
     */
    public function store($params)
    {
        $this->eloquent->create($params);
        return $this->redirect(config('module.backend.alert.create'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string
     * @throws \Throwable
     */
    public function edit($id)
    {
        return $this->render($this->views['edit']);
    }

    /**
     * @param $id
     * @param $params
     * @return mixed|void
     */
    public function update($id, $params)
    {
        $this->eloquent->update($params, $id);
        return $this->redirect(config('module.backend.alert.update'));
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function delete($id)
    {
        $this->eloquent->delete($id);
        return $this->redirect(config('module.backend.alert.delete'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string
     * @throws \Throwable
     */
    public function export()
    {
        return $this->render($this->views['export']);
    }

    /**
     * @return mixed|void
     */
    public function download()
    {
        return response()->download($this->downloadFilename);
    }

    /**
     * @param string $alert
     * @return mixed
     */
    private function redirect($alert = '')
    {
        return redirect()
            ->route($this->routes['list'])
            ->with(['flash-success' => $alert]);
    }


}