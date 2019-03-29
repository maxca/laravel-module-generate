<?php

namespace Samark\Http\Controllers;

use Samark\Http\Requests\CreateRuleRequest;
use Samark\Services\RuleHtml;
use App\Http\Controllers\Controller;

/**
 * Class RuleController
 * @package App\Http\Controllers
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class RuleController extends Controller
{
    /**
     * @var \App\Services\RuleHtml
     */
    protected $html;

    /**
     * RuleController constructor.
     * @param \App\Services\RuleHtml $html
     */
    public function __construct(RuleHtml $html)
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
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

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        return $this->html->delete($id);
    }

}