<?php

namespace Samark\ModuleGenerate\Services;

use Samark\ModuleGenerate\ConfigModule;
use Samark\ModuleGenerate\ConfigModuleAction;
use Samark\ModuleGenerate\ConfigModuleColumnRule;
use Samark\ModuleGenerate\ConfigModuleSearch;
use Samark\ModuleGenerate\ConfigModuleColumns;
use Samark\ModuleGenerate\Services\Generate\GenerateFiles;

/**
 * Class ModuleHtml
 * @package Samark\ModuleGenerate\Services
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ModuleHtml extends HtmlService
{
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
    ];

    /**
     * @var array
     */
    protected $view = [
        'create' => 'module-generate::modules.create',
        'list'   => 'module-generate::modules.module.list'
    ];

    /**
     * @param array $params
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($params = array())
    {
        $this->createModule($params);
        return $this->redirect();
    }

    /**
     * @param $params
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
     * @return mixed
     */
    protected function withRelation()
    {
        return $this->model->with(['action'])
            ->with(['search' => function ($query) {
                $query->with('column');
            }])
            ->with(['column' => function ($query) {
                $query->with('type');
                $query->with('icon');
                $query->with('rule');
            }]);
    }

    /**
     * @param $module
     */
    public function generateFile($module)
    {
        $genFile = app(GenerateFiles::class, ['namespace' => $module->name]);
        $genFile->setPath(base_path());
        $genFile->setTemplatePath('public/');
        $genFile->execute();
        $genFile->makeMigration();
    }
}