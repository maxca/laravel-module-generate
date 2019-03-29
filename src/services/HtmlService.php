<?php

namespace Samark\Services;

use Samark\Services\Components\ComponentSelectRule;
use Samark\Services\Components\ComponentSelectInputType;
use Samark\Services\Components\ComponentSelectIcon;

/**
 * Class HtmlService
 * @package App\Services
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class  HtmlService implements HtmlServiceInterface
{

    /**
     * @var \Samark\Services\Components\ComponentSelectRule
     */
    protected $selectRule;


    /**
     * @var \Samark\Services\Components\ComponentSelectInputType
     */
    protected $selectInputType;


    /**
     * @var \Samark\Services\Components\ComponentSelectIcon
     */
    protected $selectIcon;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var \Illuminate\Foundation\Application|mixed
     */
    protected $model;

    /**
     * @var array
     */
    protected $routes = [
        'list'   => '',
        'create' => '',
    ];


    /**
     * HtmlService constructor.
     * @param \Samark\Services\Components\ComponentSelectRule $selectRule
     * @param \Samark\Services\Components\ComponentSelectInputType $selectInputType
     * @param \Samark\Services\Components\ComponentSelectIcon $selectIcon
     */
    public function __construct(
        ComponentSelectRule $selectRule,
        ComponentSelectInputType $selectInputType,
        ComponentSelectIcon $selectIcon
    )
    {
        $this->selectRule      = $selectRule;
        $this->selectInputType = $selectInputType;
        $this->selectIcon      = $selectIcon;
        $this->model           = app($this->model);
    }

    /**
     * @var string
     */
    protected $view = [
        'list'   => '',
        'create' => '',
        'select' => '',
    ];

    /**
     * @throws \Throwable
     */
    protected function bundleData()
    {
        $this->data['selectRule']      = $this->selectRule->render();
        $this->data['selectInputType'] = $this->selectInputType->render();
        $this->data['selectIcon']      = $this->selectIcon->render();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        $this->data['data'] = $this->model->all();
        return view($this->view['list'], $this->data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function create()
    {
        $this->bundleData();
        return view($this->view['create'], $this->data);
    }

    /**
     * @param array $params
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($params = array())
    {
        $this->model->create($params);
        return $this->redirect();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $this->model->find($id)->delete($id);
        return $this->redirect();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail()
    {
        return view($this->view['detail'], $this->data);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirect()
    {
        return redirect()->route($this->routes['list']);
    }

}