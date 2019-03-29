<?php

namespace Samark\ModuleGenerate\Services\Components;

/**
 * Class Component
 * @package Samark\ModuleGenerate\Services\Components
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class Component implements ComponentInterface
{
    /**
     * @var \App\ConfigModuleRules
     */
    protected $model;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var array
     */
    protected $data = [];

    /**
     * Component constructor.
     */
    public function __construct()
    {
        $this->model = app($this->model);
        $this->bundleData();
    }

    /**
     *
     */
    protected function bundleData()
    {
        foreach ($this->model->all() as $item) {
            $this->data[$item->id] = $item->name;
        }
    }

    /**
     * @return string
     * @throws \Throwable
     */
    public function render()
    {
        return view($this->view, ['data' => $this->data])
            ->with($this->options)
            ->render();
    }

}