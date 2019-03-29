<?php

namespace Samark\ModuleGenerate\Http\Controllers;

use Samark\ModuleGenerate\Services\ModuleHtml;
use Samark\ModuleGenerate\Http\Requests\CreateModuleRequest;
use App\Http\Controllers\Controller;

/**
 * Class ModuleController
 * @package Samark\ModuleGenerate\Http\Controllers
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ModuleController extends Controller
{
    /**
     * @var \Samark\ModuleGenerate\Services\ModuleHtml
     */
    protected $html;

    /**
     * ModuleController constructor.
     * @param \Samark\ModuleGenerate\Services\ModuleHtml $html
     */
    public function __construct(ModuleHtml $html)
    {
        $this->html = $html;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function create()
    {
        return $this->html->create();
    }

    /**
     * @param \Samark\ModuleGenerate\Http\Requests\CreateModuleRequest $request
     * @return mixed
     */
    public function store(CreateModuleRequest $request)
    {
        return $this->html->store($request->all());
    }

    /**
     * @return mixed
     */
    public function list()
    {
        return $this->html->list();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function json($id)
    {
        return $this->html->json($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        return $this->html->delete($id);
    }


}
