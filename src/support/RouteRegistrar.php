<?php

namespace Samark\Support;

abstract class RouteRegistrar
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Register and map routes.
     */
    public static function register()
    {
        (new static)->map();
    }

    /**
     * Map the routes for the application.
     */
    abstract public function map();

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Call the router method.
     *
     * @param  string  $name
     * @param  array   $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return app('router')->$name(...$arguments);
    }
}
