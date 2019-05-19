<?php

namespace Samark\ModuleGenerate\Repositories\Services;

use Samark\ModuleGenerate\Services\ModuleHtml;
use Illuminate\Support\Facades\Request;
use Samark\ModuleGenerate\Sidebar;

/**
 * Class BackendService
 * @package App\Services
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class BackendService extends AbstractBackendService
{
    /**
     * @var \Samark\ModuleGenerate\Services\ModuleHtml
     */
    protected $module;

    /**
     * @var collection
     */
    protected $moduleData;

    /**
     * @var string
     */
    protected $containerName;

    /**
     * @var integer
     */
    protected $limit;

    /**
     * BackendService constructor.
     */
    public function __construct()
    {
        $this->module     = app(ModuleHtml::class);
        $this->moduleData = $this->getModuleData();
    }

    /**
     * @return array
     */
    protected function getActions()
    {
        return $this->moduleData->action->pluck('name', 'type')
            ->toArray();
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    protected function getLimit()
    {
        return $this->limit ?? config(CONFIG_NAME . '.backend.limit', 30);
    }

    /**
     * @return array
     */
    protected function getSearch(): array
    {
        $data = [];
        foreach ($this->moduleData->search as $key => $search) {
            $values = explode(",", $search->column->value);
            $data[$key]['name']   = $search->column->name;
            $data[$key]['type']   = $search->column->type_name;
            $data[$key]['label']  = $search->column->label;
            $data[$key]['values'] = !empty($values[0]) ? $values : null;
            $data[$key]['icon']   = $search->icon->name ?? null;
        }
        return $data;
    }

    /**
     * @return array
     */
    protected function getMessages(): array
    {
        $data = [];
        foreach ($this->moduleData->column as $key => $column) {
            foreach ($column->rule as $key => $rule) {
                $data[$column->name][$rule->name] = $rule->alert_message;
            }
        }
        return $data;
    }

    /**
     * @return array
     */
    protected function getRules($find = false): array
    {
        $data = [];
        foreach ($this->moduleData->column as $key => $column) {
            foreach ($column->rule as $key => $rule) {
                $data[$column->name][$rule->name] = true;
                if ($column->type->name == 'file') {
                    $data[$column->name]['extension'] =
                        config(CONFIG_NAME . '.backend.image', 'jpg|jpeg|png');
                    $data[$column->name]['size']      = $this->getMaxUploadFile();
                }
            }
            if ($find == true && $column->type->name == 'file') {
                unset($data[$column->name]);
            }
        }
        return $data;
    }

    /**
     * @return mixed
     */
    protected function getModuleData()
    {
        return $this->module->findModuleByName($this->containerName)
            ->first();
    }

    /**
     * @return mixed
     */
    protected function getEloquent($find = false)
    {
        return $find
            ? $this->eloquent->find($this->id)
            : $this->eloquent->paginate($this->getLimit());
    }

    /**
     * @return array
     */
    protected function getColumns()
    {
        return $this->moduleData->column;
    }

    /**
     * @return mixed
     */
    protected function getLinkAction()
    {
        $links = $this->moduleData->action->pluck('link_action', 'type')
            ->toArray();
        $data  = [];
        foreach ($links as $key => $link) {
            $data[$key] = !is_null($link)
                ? $link
                : strtolower($this->containerName . '.' . $key);
        }
        return $data;
    }

    /**
     * @return array
     */
    protected function getColumnName(): array
    {
        return $this->moduleData->column->pluck('name')
            ->toArray();
    }

    /**
     * @param array $params
     * @return mixed|void
     */
    public function store($params)
    {
        self::upload($params);
        return parent::store($params);
    }

    /**
     * @param $id
     * @param $params
     * @return mixed|void
     */
    public function update($id, $params)
    {
        self::upload($params);
        return parent::update($id, $params);
    }

    /**
     * @param $params
     */
    protected function upload(&$params)
    {
        foreach ($params as $key => $request) {
            if (request()->hasFile($key)) {
                $name = request()->file($key)->getClientOriginalName();
                request()->file($key)
                    ->move(public_path('/upload'), $name);
                $params[$key] = '/upload/' . $name;
            }
        }
    }

    /**
     * @return float|int
     */
    protected function getMaxUploadFile()
    {
        return intval(
                str_replace('M', '', ini_get('upload_max_filesize'))
            ) * 1024 * 1024;
    }

    /**
     * @return mixed
     */
    public function getSidebars()
    {
        return Sidebar::get();
    }


}