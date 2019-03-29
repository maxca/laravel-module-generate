<?php

namespace Samark\ModuleGenerate;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConfigModuleAction
 * @package Samark
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ConfigModuleAction extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'config_module_id',
        'type',
        'name',
        'key',
        'link',
        'link_action',
        'sort',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
