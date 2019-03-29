<?php

namespace Samark\Services;

use Samark\ConfigModuleInputType;

/**
 * Class InputTypeHtml
 * @package Samark\Services
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class InputTypeHtml extends HtmlService
{
    /**
     * @var string
     */
    protected $model = ConfigModuleInputType::class;

    /**
     * @var array
     */
    protected $routes = [
        'create' => 'type.create',
        'list'   => 'type.list',
    ];
    /**
     * @var array
     */
    protected $view = [
        'create' => 'modules.type.create',
        'list'   => 'modules.type.list'
    ];
}