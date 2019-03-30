<?php

namespace Samark\ModuleGenerate\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class AutoLoadRouteProvider
 * @package Samark\ModuleGenerate\Providers
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class AutoLoadRouteProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     * In addition, it is set as the URL generator's root namespace.
     * @var string
     */
    protected $namespace;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var array
     */
    protected $routes;

    /**
     * @var
     */
    protected $middlewareType;

    /**
     * @var string
     */
    protected $prefix;

    /**
     * Define your route model bindings, pattern filters, etc.
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * @param $type
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function getPath($type)
    {
        return $this->config("path.{$type}", 'routes/api');
    }

    /**
     * @param $type
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function getNamespace($type)
    {
        return $this->config("namespace.{$type}", 'App\Http\Controllers\Api');
    }

    /**
     * @param $type
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function getPrefix($type)
    {
        return $this->config("prefix.{$type}", 'api');
    }

    /**
     * @param string $type
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function getMiddlewareType($type = 'api')
    {
        return $this->config("middleware.{$type}", 'api');
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function getFilename()
    {
        return $this->config("filename", 'Route.php');
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function getEnableAutoloadRoute()
    {
        return $this->config("autoload", false);
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function getUpperCaseRouteFile()
    {
        return $this->config("upper_case", true);
    }

    /**
     * Define the routes for the application.
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function map()
    {
        if ($this->getEnableAutoloadRoute()) {
            $this->mapWebRoutes();
            $this->mapApiRoutes();
        }
    }

    /**
     * setting mapping route api
     */
    protected function mapApiRoutes()
    {
        $this->routes         = [];
        $this->middlewareType = $this->getMiddlewareType('api');
        $this->path           = $this->getPath('api');
        $this->namespace      = $this->getNamespace('api');
        $this->prefix         = $this->getPrefix('api');
        $this->getDirectoryLists();
        $this->registerRoutes();
    }

    /**
     * setting mapping route web
     */
    protected function mapWebRoutes()
    {
        $this->routes         = [];
        $this->middlewareType = $this->getMiddlewareType('web');
        $this->path           = $this->getPath('web');
        $this->namespace      = $this->getNamespace('web');
        $this->prefix         = $this->getPrefix('web');
        $this->getDirectoryLists();
        $this->registerRoutes();
    }

    /**
     * read file on route directory
     * for mapping route and autoload
     */
    protected function getDirectoryLists()
    {
        foreach (scandir(base_path($this->path)) as $key => $path) {
            $path = ucfirst($path);
            if ($this->checkIsDirectory($path) && $this->checkIsFile($path)) {
                $this->routes[$key]['path']      = $this->getFullFilePath($path, $this->getUpperCaseRouteFile());
                $this->routes[$key]['namespace'] = $this->namespace;
            }
        }
    }


    /**
     * @param $path
     * @return bool
     */
    private function checkIsDirectory($path)
    {
        return is_dir(base_path($this->path) . '/' . $path);
    }

    /**
     * @param $path
     * @return bool
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function checkIsFile($path)
    {
        return is_file(base_path($this->path) . '/' . $path . '/' . $path . $this->getFilename());
    }

    /**
     * @param $path
     * @param bool $upperCase
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function getFullFilePath($path, $upperCase = true)
    {
        return $upperCase
            ? $this->path . '/' . ucfirst($path) . '/' . ucfirst($path) . $this->getFilename()
            : $this->path . '/' . $path . '/' . $path . $this->getFilename();
    }

    /**
     * register routes
     */
    protected function registerRoutes()
    {
        foreach ($this->routes as $key => $route) {
            Route::middleware($this->middlewareType)
                ->namespace($route['namespace'])
                ->prefix($this->prefix)
                ->group(base_path($route['path']));
        }
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function config($key, $default = null)
    {
        /** @var  \Illuminate\Config\Repository $config */
        $config = $this->app->make('config');
        return $config->get(CONFIG_NAME . ".route.{$key}", $default);
    }
}