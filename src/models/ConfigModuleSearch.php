<?php

namespace Samark;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConfigModuleSearch
 * @package Samark
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ConfigModuleSearch extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'config_module_id',
        'config_module_column_id',
        'status',
        'sort',
    ];

    /**
     * @return mixed
     */
    public function column()
    {
        return $this->hasOne(ConfigModuleColumns::class, 'id', 'config_module_column_id');
    }
}
