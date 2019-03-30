<?php

namespace Samark\ModuleGenerate\Providers;

use Samark\ModuleGenerate\Http\Routes\ModuleRoute;
use Samark\ModuleGenerate\Providers\RouteServiceProvider as ServiceProvider;


/**
 * Class RouteServiceRegistar
 * @package Samark\ModuleGenerate\Providers
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class RouteServiceRegistar extends ServiceProvider
{
    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function routeAttributes()
    {
        return array_merge($this->config('attributes', []), [
            'namespace' => 'Samark\\ModuleGenerate\\Http\\Controllers',
        ]);
    }


    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function isEnabled()
    {
        return $this->config('enabled', false);
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Define the routes for the application.
     */
    public function map()
    {
        if ($this->isEnabled()) {
            $this->group($this->routeAttributes(), function() {
                ModuleRoute::register();
            });
        }
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * @param $key
     * @param null $default
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function config($key, $default = null)
    {
        /** @var  \Illuminate\Config\Repository  $config */
        $config = $this->app->make('config');
        return $config->get(CONFIG_NAME.".route.$key", $default);
    }
}
