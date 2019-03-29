<?php

namespace Samark\ModuleGenerate\Http\Controllers;

use Samark\ModuleGenerate\Http\Requests\CreateRuleRequest;
use Samark\ModuleGenerate\Services\ModuleHtml;
use App\Http\Controllers\Controller;

/**
 * Class RuleController
 * @package App\Http\Controllers
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ConfigModuleController extends Controller
{
    /**
     * @var \App\Services\RuleHtml
     */
    protected $html;


    public function __construct(ModuleHtml $html)
    {
        $this->html = $html;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        return $this->html->list();
    }


    public function create()
    {
        return $this->html->create();
    }

    /**
     * @param \App\Http\Requests\CreateRuleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRuleRequest $request)
    {
        return $this->html->store($request->all());
    }


    public function delete($id)
    {
        return $this->html->delete($id);
    }

}