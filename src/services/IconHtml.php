<?php

namespace Samark\ModuleGenerate\Services;

use Samark\ModuleGenerate\ConfigModuleIcons;

/**
 * Class IconHtml
 * @package Samark\ModuleGenerate\Services
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class IconHtml extends HtmlService
{
    /**
     * @var string
     */
    protected $model = ConfigModuleIcons::class;

    /**
     * @var array
     */
    protected $routes = [
        'create' => 'icon.create',
        'list'   => 'icon.list',
    ];
    /**
     * @var array
     */
    protected $view = [
        'create' => 'module-generate::modules.icon.create',
        'list'   => 'module-generate::modules.icon.list'
    ];
}