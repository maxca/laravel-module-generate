<?php

namespace Samark\ModuleGenerate\Providers;

use Samark\ModuleGenerate\Http\Routes\ModuleRoute;
use Arcanedev\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class RouteServiceRegistar
 * @package Arcanedev\LogViewer\Providers
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class RouteServiceRegistar extends ServiceProvider
{
    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Get Route attributes
     *
     * @return array
     */
    public function routeAttributes()
    {
        return array_merge($this->config('attributes', []), [
            'namespace' => 'Samark\ModuleGenerate\\Http\\Controllers',
        ]);
    }

    /**
     * Check if routes is enabled
     *
     * @return bool
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
     * Get config value by key
     *
     * @param  string      $key
     * @param  mixed|null  $default
     *
     * @return mixed
     */
    private function config($key, $default = null)
    {
        /** @var  \Illuminate\Config\Repository  $config */
        $config = $this->app->make('config');

        return $config->get("module-generate.route.$key", $default);
    }
}
