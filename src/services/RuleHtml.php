<?php

namespace Samark\ModuleGenerate\Services;

use Samark\ModuleGenerate\ConfigModuleRules;


/**
 * Class RuleHtml
 * @package Samark\ModuleGenerate\Services
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class RuleHtml extends HtmlService
{
    /**
     * @var string
     */
    protected $model = ConfigModuleRules::class;

    /**
     * @var array
     */
    protected $view = [
        'create' => 'module-generate::modules.rule.create',
        'list'   => 'module-generate::modules.rule.list'

    ];
}