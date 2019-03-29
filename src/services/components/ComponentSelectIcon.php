<?php

namespace Samark\ModuleGenerate\Services\Components;

use Samark\ModuleGenerate\ConfigModuleIcons;

/**
 * Class ComponentSelectIcon
 * @package App\Services\Components
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ComponentSelectIcon extends Component
{
    /**
     * @var string
     */
    protected $model = ConfigModuleIcons::class;

    /**
     * @var string
     */
    protected $view = 'module-generate::modules.component.select';

    /**
     * @var array
     */
    protected $data = [
        '' => 'select icon'
    ];

    /**
     * @var array
     */
    protected $options = [
        'name'   => 'icon[]',
        'value'  => 'Please select rules',
        'option' => [
            'class' => 'form-control',
        ],
    ];
}