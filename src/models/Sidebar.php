<?php

namespace Samark\ModuleGenerate;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sidebar
 * @package Samark
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class Sidebar extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'parent_id',
        'status',
        'link',
        'icon',
        'type',
        'permissions',
        'roles',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'name' => 'array'
    ];

    /**
     * @return mixed
     */
    public function child()
    {
        return $this->hasMany(Sidebar::class, 'parent_id', 'id');
    }
}
