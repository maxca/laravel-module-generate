<?php

namespace Samark\Services\Components;

use Samark\ConfigModuleInputType;

/**
 * Class ComponentSelectRule
 * @package App\Services\Components
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class  ComponentSelectInputType extends Component
{
    /**
     * @var string
     */
    protected $model = ConfigModuleInputType::class;

    protected $view = 'modules.component.select';

    protected $data = [
//        '' => 'select type'
    ];

    protected $options = [
        'name'   => 'type[]',
        'value'  => 'Please select type',
        'option' => [
            'class' => 'form-control',
        ],
    ];
}