<?php

namespace Samark\ModuleGenerate;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConfigModuleColumns
 * @package Samark
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ConfigModuleColumns extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'config_module_id',
        'config_module_input_type_id',
        'config_module_icon_id',
        'name',
        'value',
        'sort',
        'label',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    /**
     * @var array
     */
    protected $appends = [
        'type_name',
    ];

    /**
     * @return mixed
     */
    public function getTypeNameAttribute()
    {
        return $this->type->name;
    }

    /**
     * @return mixed
     */
    public function type()
    {
        return $this->hasOne(ConfigModuleInputType::class, 'id', 'config_module_input_type_id');
    }

    /**
     * @return mixed
     */
    public function icon()
    {
        return $this->hasOne(ConfigModuleIcons::class, 'id', 'config_module_icon_id');
    }

    /**
     * @return mixed
     */
    public function rule()
    {
        return $this->belongsToMany(ConfigModuleRules::class,
            'config_module_column_rules', 'config_module_column_id',
            'config_module_rule_id')
            ->withPivot('value');
    }
}
