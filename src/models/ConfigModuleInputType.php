<?php

namespace Samark\ModuleGenerate;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConfigModuleInputType
 * @package Samark
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ConfigModuleInputType extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'value',
        'status',
        'allowed_input'
    ];
}
