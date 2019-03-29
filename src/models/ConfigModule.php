<?php

namespace Samark;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConfigModules
 * @package App
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class ConfigModule extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'key',
        'status',
        'sort',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function action()
    {
        return $this->hasMany(ConfigModuleAction::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function column()
    {
        return $this->hasMany(ConfigModuleColumns::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function search()
    {
        return $this->hasMany(ConfigModuleSearch::class);
    }


}
