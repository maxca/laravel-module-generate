<?php

namespace Samark\Services\Generate;

/**
 * Trait GenerateFileConfig
 * @package Samark\Services\Generate
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
trait GenerateFileConfig
{

    /**
     * @return array
     */
    public function getConfig()
    {
        if (!empty(config('generate.template'))) {
            return config('generate.template');
        }
        return array(

            'Request'            => array(
                'resource' => 'template/Request.stub',
                'target'   => 'app/Http/Requests/',
                'needDir'  => true,
            ),
            'Controller'         => array(
                'resource'  => 'template/Controller.stub',
                'target'    => 'app/Http/Controllers/API/V1/',
                'needDir'   => true,
                'namespace' => 'App\Http\Controllers\API\V1',
            ),
            'Model'              => array(
                'resource' => 'template/Model.stub',
                'target'   => 'app/Models/',
                'needDir'  => false,
            ),
            'RepositoryEloquent' => array(
                'resource' => 'template/Repository.stub',
                'target'   => 'app/Repositories/',
                'needDir'  => true,
            ),
            'Repository'         => array(
                'resource' => 'template/Interface.stub',
                'target'   => 'app/Interfaces/',
                'needDir'  => false,
            ),
            'Route'              => array(
                'resource' => 'template/Route.stub',
                'target'   => 'Routes/',
                'needDir'  => true,
            ),
            'Transformer'        => array(
                'resource' => 'template/Transformer.stub',
                'target'   => 'app/Transformers/',
                'needDir'  => false,
            ),
            'Factory'            => array(
                'resource' => 'template/Factory.stub',
                'target'   => 'database/factories/',
                'needDir'  => false,
            ),
            'Test'               => array(
                'resource' => 'template/Tests.stub',
                'target'   => 'Tests/',
                'needDir'  => true,
            ),
            'Seeder'             => array(
                'resource' => 'template/Seeder.stub',
                'target'   => 'database/seeds/',
                'needDir'  => true,
            ),
            'Lang'               => array(
                'resource' => 'template/Lang.stub',
                'target'   => 'resources/lang/',
                'needDir'  => true,
                'lang'     => true,
            ),
        );
    }

    /**
     * @return bool
     */
    public function getCustomPath()
    {
        if (!empty(config('generate.custom_path'))) {
            return config('generate.custom_path');
        }
        return true;
    }


}