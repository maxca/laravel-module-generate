<?php return [

    /*
    |--------------------------------------------------------------------------
    | Setting open route
    |--------------------------------------------------------------------------
    */
    'route' => [
        'enabled'   => true,
        'namespace' => [
            'api' => 'App\Http\Controllers',
            'web' => 'App\Http\Controllers',
        ],
        'prefix'    => [
            'api' => 'api',
            'web' => '',
        ],
        'path'      => [
            'api' => 'routes/api/',
            'web' => 'routes/web/',
        ],

        'middleware' => [
            'api' => 'api',
            'web' => 'web',
        ],
        /*
        |--------------------------------------------------------------------------
        | Setting route file
        |--------------------------------------------------------------------------
        */
        'filename'   => 'Route.php',

        /*
        |--------------------------------------------------------------------------
        | Setting enabled autoload route in path
        |--------------------------------------------------------------------------
        */
        'autoload'   => false,
        /*
        |--------------------------------------------------------------------------
        | Setting uppercase directory
        |--------------------------------------------------------------------------
        */
        'upper_case' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default template file generate
    |--------------------------------------------------------------------------
    */

    'template' => [
        'RequestApi'         => [
            'resource' => 'template/RequestApi.stub',
            'target'   => 'app/Http/Requests/Api/',
            'needDir'  => true,
            'name'     => 'Request',
        ],
        'Request'            => [
            'resource' => 'template/Request.stub',
            'target'   => 'app/Http/Requests/Backend/',
            'needDir'  => true,
            'name'     => 'Request',
        ],
        'ControllerApi'      => [
            'resource'  => 'template/ApiController.stub',
            'target'    => 'app/Http/Controllers/Api/',
            'namespace' => 'App/',
            'needDir'   => true,
            'name'      => 'Controller',
        ],
        'Controller'         => [
            'resource'  => 'template/BackendController.stub',
            'target'    => 'app/Http/Controllers/Backend/',
            'namespace' => 'App/',
            'needDir'   => true,
            'name'      => 'BackendController',
        ],
        'Model'              => [
            'resource' => 'template/Model.stub',
            'target'   => 'app/Models/',
            'needDir'  => false,
        ],
        'RepositoryEloquent' => [
            'resource' => 'template/Repository.stub',
            'target'   => 'app/Repositories/',
            'needDir'  => true,
            'name'     => 'RepositoryEloquent',
        ],
        'ApiRepository'      => [
            'resource' => 'template/ApiRepository.stub',
            'target'   => 'app/Repositories/',
            'needDir'  => true,
            'name'     => 'ApiRepository',
        ],
        'Repository'         => [
            'resource' => 'template/Interface.stub',
            'target'   => 'app/Interfaces/',
            'needDir'  => false,
            'name'     => 'Repository',
        ],
        'RouteApi'           => [
            'resource' => 'template/Route.stub',
            'target'   => 'Routes/api/',
            'needDir'  => true,
            'name'     => 'Route',
        ],
        'RouteWeb'           => [
            'resource' => 'template/Route.stub',
            'target'   => 'Routes/web/',
            'needDir'  => true,
            'name'     => 'Route',
        ],
        'Transformer'        => [
            'resource' => 'template/Transformer.stub',
            'target'   => 'app/Transformers/',
            'needDir'  => false,
            'name'     => 'Transformer',
        ],
        'Factory'            => [
            'resource' => 'template/Factory.stub',
            'target'   => 'database/factories/',
            'needDir'  => false,
        ],
        'Test'               => [
            'resource' => 'template/Tests.stub',
            'target'   => 'Tests/',
            'needDir'  => true,
        ],
        'Seeder'             => [
            'resource' => 'template/Seeder.stub',
            'target'   => 'database/seeds/',
            'needDir'  => true,
        ],
        'Lang'               => [
            'resource' => 'template/Lang.stub',
            'target'   => 'resources/lang/',
            'needDir'  => true,
            'lang'     => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | set using repository
    |--------------------------------------------------------------------------
    */

    'using_repository' => false,

    /*
    |--------------------------------------------------------------------------
    | Set list of need duplicate copy file
    |--------------------------------------------------------------------------
    | value only : requestType, configLang
    */

    'need_duplicate' => [
        'Request'    => 'requestType',
        'RequestApi' => 'requestType',
        'Lang'       => 'configLang',
    ],
];