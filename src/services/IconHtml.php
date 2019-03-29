<?php

namespace Samark\Services;

use Samark\ConfigModuleIcons;

/**
 * Class IconHtml
 * @package Samark\Services
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
        'create' => 'modules.icon.create',
        'list'   => 'modules.icon.list'
    ];
}