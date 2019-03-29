<?php

namespace Samark\ModuleGenerate\Http\Controllers;

use Samark\ModuleGenerate\Http\Requests\CreateIconRequest;
use Samark\ModuleGenerate\Services\IconHtml;
use App\Http\Controllers\Controller;

/**
 * Class IconController
 * @package App\Http\Controllers
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class IconController extends Controller
{
    /**
     * @var \App\Services\RuleHtml
     */
    protected $html;

    /**
     * RuleController constructor.
     * @param \App\Services\IconHtml $html
     */
    public function __construct(IconHtml $html)
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

    public function detail($id) {
        return $this->html->detail();
    }
    /**
     * @param \App\Http\Requests\CreateIconRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateIconRequest $request)
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