<?php

namespace Samark\ModuleGenerate\Services;

use Samark\ModuleGenerate\Sidebar;

class SidebarsHtml
{
    protected $moduleName;

    public function __construct($moduleName)
    {
        $this->moduleName = $moduleName;
    }

    protected function initial()
    {
        return [
            'status'      => 'active',
            'link'        => '',
            'icon'        => '',
            'type'        => '',
            'permissions' => '',
            'roles'       => '',
        ];
    }

    public function crateParent()
    {

    }
}