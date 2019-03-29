<?php

namespace Samark;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConfigModuleIcons
 * @package Samark
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ConfigModuleIcons extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
    ];
}
