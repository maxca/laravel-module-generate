<?php

namespace Samark;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConfigModuleColumnRule
 * @package Samark
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ConfigModuleColumnRule extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'config_module_column_id',
        'config_module_rule_id',
        'value'
    ];
}
