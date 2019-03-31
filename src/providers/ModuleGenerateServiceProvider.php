<?php

namespace Samark\ModuleGenerate\Providers;

use Samark\ModuleGenerate\Support\PackageServiceProvider;
use Collective\Html\HtmlServiceProvider;
use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;

class ModuleGenerateServiceProvider extends PackageServiceProvider
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * Package name.
     * @var string
     */
    protected $package = 'module-generate';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Register the service provider.
     */
    public function register()
    {
        parent::register();

        $this->registerConfig();
        $this->registerAlias();

        $this->registerProviders([
            RouteServiceRegistar::class,
            HtmlServiceProvider::class,
            AutoLoadRouteProvider::class
        ]);

    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        parent::boot();

        $this->publishConfig();
        $this->publishMigrations();
        $this->publishSeeders();
        $this->publishViews();
        $this->publishTemplate();

    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Register the html form data class.
     */
    private function registerAlias()
    {
        $this->alias(FormFacade::class, 'Form');
        $this->alias(HtmlFacade::class, 'Html');
    }
}
