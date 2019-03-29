<?php

namespace Samark\ModuleGenerate\Services\Components;

use Samark\ModuleGenerate\ConfigModuleInputType;

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

    /**
     * @var string
     */
    protected $view = 'module-generate::modules.component.select';

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var array
     */
    protected $options = [
        'name'   => 'type[]',
        'value'  => 'Please select type',
        'option' => [
            'class' => 'form-control',
        ],
    ];
}