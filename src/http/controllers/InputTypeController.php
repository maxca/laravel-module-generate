<?php

namespace Samark\Http\Controllers;

use Samark\Http\Requests\CreateRuleRequest;
use Samark\Services\InputTypeHtml;
use App\Http\Controllers\Controller;

/**
 * Class InputTypeController
 * @package App\Http\Controllers
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class InputTypeController extends Controller
{
    /**
     * @var \App\Services\RuleHtml
     */
    protected $html;

    /**
     * InputTypeController constructor.
     * @param \App\Services\InputTypeHtml $html
     */
    public function __construct(InputTypeHtml $html)
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