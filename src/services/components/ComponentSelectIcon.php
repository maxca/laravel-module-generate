<?php

namespace Samark\Services\Components;

use Samark\ConfigModuleIcons;

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
    protected $view = 'modules.component.select';

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