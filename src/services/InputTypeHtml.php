<?php

namespace Samark\ModuleGenerate\Services;

use Samark\ModuleGenerate\ConfigModuleInputType;

/**
 * Class InputTypeHtml
 * @package Samark\ModuleGenerate\Services
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
        'create' => 'module-generate::type.create',
        'list'   => 'module-generate::type.list',
    ];
    /**
     * @var array
     */
    protected $view = [
        'create' => 'module-generate::modules.type.create',
        'list'   => 'module-generate::modules.type.list'
    ];
}