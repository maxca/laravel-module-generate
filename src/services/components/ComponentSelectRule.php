<?php

namespace Samark\Services\Components;

use Samark\ConfigModuleRules;

/**
 * Class ComponentSelectRule
 * @package Samark\Services\Components
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class  ComponentSelectRule extends Component
{
    /**
     * @var string
     */
    protected $model = ConfigModuleRules::class;

    /**
     * @var string
     */
    protected $view = 'modules.component.select';

    /**
     * @var array
     */
    protected $data = [
        '' => 'select rule'
    ];

    /**
     * @var array
     */
    protected $options = [
        'name'   => 'rule[]',
        'value'  => 'Please select rules',
        'option' => [
            'class'     => 'form-control select-rule',
            'data-name' => 'rule',
        ],
    ];
}