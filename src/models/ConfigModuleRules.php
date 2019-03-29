<?php

namespace Samark\ModuleGenerate;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConfigModuleRules
 * @package Samark
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ConfigModuleRules extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'type',
        'name',
        'alert_message',
        'status',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}

