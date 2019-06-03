<?php

namespace Samark\ModuleGenerate\Services;

use Illuminate\Support\Str;
use Samark\ModuleGenerate\ConfigModule;
use Samark\ModuleGenerate\ConfigModuleAction;
use Samark\ModuleGenerate\ConfigModuleColumnRule;
use Samark\ModuleGenerate\ConfigModuleSearch;
use Samark\ModuleGenerate\ConfigModuleColumns;
use Samark\ModuleGenerate\Sidebar;
use Samark\ModuleGenerate\Services\Generate\GenerateFiles;
use Samark\ModuleGenerate\Services\Generate\GenerateMigration;

/**
 * Class ModuleHtml
 * @package Samark\ModuleGenerate\Services
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ModuleHtml extends HtmlService
{
    /**
     * @var array
     */
    protected $sidebars = [
        'main'   => 'Managment',
        'create' => 'Create',
        'list'   => 'List'
    ];

    /**
     * @var string
     */
    protected $model = ConfigModule::class;

    /**
     * @var array
     */
    protected $actionLink = [
        'create_link' => 'create',
        'update_link' => 'update',
        'delete_link' => 'delete',
        'detail_link' => 'detail',
        'export_link' => 'export',
        'search_link' => 'search',
    ];

    /**
     * @var array
     */
    protected $routes = [
        'create' => 'module-generate::module.create',
        'list'   => 'module-generate::module.list',
        'update' => 'module-generate::module.submit.update',
    ];

    /**
     * @var array
     */
    protected $view = [
        'create' => 'module-generate::modules.create',
        'update' => 'module-generate::modules.update',
        'list'   => 'module-generate::modules.module.list',

    ];

    /**
     * @var array
     */
    protected $columnsList = [];

    /**
     * @param array $params
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store($params = array())
    {
        $this->createModule($params);
        return $this->redirect();
    }

    /**
     * @param array $params
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($params = array())
    {
        $create = [
            'name'   => $params['name'],
            'status' => $params['status'],
            'key'    => $params['module_key'],
        ];
        $module = $this->model->create($create);
        $this->mappingAndCreateAction($params, $module->id);
        $this->createColumn($params, $module->id);
        return $this->redirect();
    }

    /**
     * @param $params
     * @throws \Exception
     */
    public function createModule($params)
    {
        $create = [
            'name'   => $params['name'],
            'status' => $params['status'],
            'key'    => $params['module_key'],
        ];
        $module = $this->model->create($create);
        $this->mappingAndCreateAction($params, $module->id);
        $this->createColumn($params, $module->id);
        $this->generateFile($module);
    }

    /**
     * @param $params
     * @param $moduleId
     * @param $columnId
     */
    protected function createSearch($status, $moduleId, $columnId, $key)
    {
        $create['config_module_id']        = $moduleId;
        $create['config_module_column_id'] = $columnId;
        $create['status']                  = $status;
        $create['sort']                    = $key;
        ConfigModuleSearch::create($create);

    }

    /**
     * @param $rules
     * @param $ruleValues
     * @param $columnId
     * @return mixed
     */
    protected function createRule($rules, $ruleValues, $columnId)
    {
        $create = array();
        foreach ($rules as $index => $item) {
            if (!is_null($item)) {
                $create[$index]['config_module_column_id'] = $columnId;
                $create[$index]['config_module_rule_id']   = $item;
                $create[$index]['value']                   = $ruleValues[$index] ?? null;
                $create[$index]['created_at']              = now();
                $create[$index]['updated_at']              = now();
            }
        }
        return ConfigModuleColumnRule::insert($create);
    }

    /**
     * @param $params
     * @param $moduleId
     * @return bool
     */
    protected function createColumn($params, $moduleId)
    {

        foreach ($params['column_name'] as $key => $value) {

            $create['config_module_input_type_id'] = $params['type'][$key];
            $create['config_module_icon_id']       = $params['icon'][$key] ?? null;
            $create['config_module_id']            = $moduleId;
            $create['sort']                        = $key + 1;
            $create['name']                        = $value;
            $create['label']                       = $params['label'][$key] ?? null;
            $create['value']                       = $params['value'][$key] ?? null;
            $create['created_at']                  = now();
            $create['updated_at']                  = now();

            $column = ConfigModuleColumns::create($create);
            $this->createRule($params['rule'][$key], $params['rule_value'][$key], $column->id);
            $this->createSearch($params['search_column'][$key], $moduleId, $column->id, $key);
        }
        return true;
    }


    /**
     * @param $params
     * @param $moduleId
     */
    protected function mappingAndCreateAction($params, $moduleId)
    {
        foreach ($params as $key => $value) {
            if (array_key_exists($key, $this->actionLink)) {
                if (isset($params[$this->actionLink[$key]])) {
                    $action = [
                        'config_module_id' => $moduleId,
                        'type'             => $this->actionLink[$key],
                        'name'             => $this->actionLink[$key],
                        'link'             => $value,
                    ];
                    ConfigModuleAction::create($action);
                }

            }
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function json($id)
    {
        $this->model = $this->model->where(['id' => $id]);
        return $this->withRelation()->get();
    }

    /**
     * @param $name
     * @return mixed
     */
    public function findModuleByName($name)
    {
        $this->model = $this->model->where(['name' => $name]);
        return $this->withRelation()->get();
    }

    /**
     * @param $module
     * @throws \Exception
     */
    public function generateFile($module)
    {
        $genFile = app(GenerateFiles::class, ['namespace' => $module->name]);
        $genFile->setPath(base_path());
        $genFile->setTemplatePath('public/');
        $genFile->execute();
        $this->genrateMigration($module);
        $this->generateModel($module);
        $this->generateSidebar($module);

        #$genFile->makeMigration();
    }


    /**
     * @param $module
     * @return array
     */
    protected function getColumnForMigration($module)
    {
        $data = array();
        foreach ($module->column()->get() as $key => $column) {
            $columnRule                       = $column->rule->first();
            $this->columnsList[$column->name] = $column->type_name;
            $data[$key]['name']               = $column->name;
            $data[$key]['value']              = explode(",", $column->value);
            $data[$key]['type']               = $column->type->name;
            $data[$key]['rule']               = !is_null($columnRule)
            && $columnRule == 'required' ? 'required' : 'nullable';
        }


        return $data;
    }

    /**
     * @param $module
     * @throws \Exception
     */
    protected function genrateMigration($module)
    {
        $this->getColumnForMigration($module);
        $app = app(GenerateMigration::class, ['namespace' => $module->name]);
        $app->initGenMigration($this->getColumnForMigration($module));
    }

    /**
     * @param $module
     */
    protected function generateModel($module)
    {
        $app = app(GenerateMigration::class, ['namespace' => $module->name]);
        $app->genModelFillable($this->columnsList);
    }

    /**
     * @param $module
     */
    protected function generateSidebar($module)
    {
        $parentId   = 0;
        $configLink = config(CONFIG_NAME . '.backend.link') . '/' . Str::plural($module->name);

        foreach ($this->sidebars as $key => $value) {
            $link = $key == 'list' ? $configLink : $configLink . '/create';
            $data = [
                'name'        => [
                    'en' => ucfirst($module->name) . ' ' . $value,
                    'th' => ucfirst($module->name) . ' ' . $value,
                ],
                'parent_id'   => $parentId,
                'status'      => 'active',
                'link'        => $link,
                'icon'        => 'nav-icon far fa-user',
                'type'        => $key == 'main' ? 'parent' : 'child',
                'permissions' => strtolower($module->name) . '.*',
                'roles'       => 'admin',
            ];

            $response = Sidebar::create($data);
            if ($key == 'main') {
                $parentId = $response->id;
            }
        }

    }


}