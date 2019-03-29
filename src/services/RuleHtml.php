<?php

namespace Samark\Services;

use Samark\ConfigModuleRules;


/**
 * Class RuleHtml
 * @package Samark\Services
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
        'create' => 'modules.rule.create',
        'list'   => 'modules.rule.list'

    ];
}