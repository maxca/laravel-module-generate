<?php

namespace Samark\Http\Controllers;

use Samark\Services\ModuleHtml;
use Samark\Http\Requests\CreateModuleRequest;
use App\Http\Controllers\Controller;

/**
 * Class ModuleController
 * @package Samark\Http\Controllers
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ModuleController extends Controller
{
    /**
     * @var \Samark\Services\ModuleHtml
     */
    protected $html;

    /**
     * ModuleController constructor.
     * @param \Samark\Services\ModuleHtml $html
     */
    public function __construct(ModuleHtml $html)
    {
        $this->html = $html;
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return $this->html->create();
    }

    /**
     * @param \Samark\Http\Requests\CreateModuleRequest $request
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


}
