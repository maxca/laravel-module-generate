<?php

namespace Samark\ModuleGenerate\Http\Routes;

use Samark\ModuleGenerate\Support\RouteRegistrar;

class ModuleRoute extends RouteRegistrar
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Map all routes.
     */
    public function map()
    {
        $this->name('module-generate::')->group(function () {
            $this->mapModuleRoutes();
        });
    }

    /**
     * Map the logs routes.
     */
    private function mapModuleRoutes()
    {
        $this->group([
            'prefix' => 'rule',
            'as'     => 'rule.'
        ], function () {
            $this->get('/', 'RuleController@list')->name('list');
            $this->get('/create', 'RuleController@create')->name('create');
            $this->get('/delete/{id}', 'RuleController@delete')->name('delete');
            $this->post('/store', 'RuleController@store');

        });


        $this->group([
            'prefix' => 'type',
            'as'     => 'type.'
        ], function () {
            $this->get('/', 'InputTypeController@list')->name('list');
            $this->get('/create', 'InputTypeController@create')->name('create');
            $this->get('/delete/{id}', 'InputTypeController@delete')->name('delete');
            $this->post('/store', 'InputTypeController@store');

        });

        $this->group([
            'prefix' => 'module',
            'as'     => 'module.'
        ], function () {
            $this->get('/', 'ModuleController@list')->name('list');
            $this->get('/create', 'ModuleController@create')->name('create');
            $this->get('/delete/{id}', 'ModuleController@delete')->name('delete');
            $this->get('/json/{id}', 'ModuleController@json')->name('json');
            $this->post('/store', 'ModuleController@store');

        });

        $this->group([
            'prefix' => 'icon',
            'as'     => 'icon.'
        ], function () {
            $this->get('/', 'IconController@list')->name('list');
            $this->get('/create', 'IconController@create')->name('create');
            $this->get('/delete/{id}', 'IconController@delete')->name('delete');
            $this->post('/store', 'IconController@store');

        });
    }
}
