<?php return [

    /*
    |--------------------------------------------------------------------------
    | Setting open route
    |--------------------------------------------------------------------------
    */
    'route' => [
        'enabled' => true,
        'namespace' => [
            'api' => 'App\Http\Controllers\Api',
            'web' => 'App\Http\Controllers\Web',
        ],
        'prefix' => [
            'api' => 'api',
            'web' => 'web',
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
        'filename' => 'Route.php',

    /*
    |--------------------------------------------------------------------------
    | Setting enabled autoload
    |--------------------------------------------------------------------------
    */
        'autoload' => true,
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

    'template'         => [
        'RequestApi'         => [
            'resource' => 'template/Request.stub',
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
            'name'      => 'Request',
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
        ],
        'Repository'         => [
            'resource' => 'template/Interface.stub',
            'target'   => 'app/Interfaces/',
            'needDir'  => false,
        ],
        'Route'              => [
            'resource' => 'template/Route.stub',
            'target'   => 'Routes/',
            'needDir'  => true,
        ],
        'Transformer'        => [
            'resource' => 'template/Transformer.stub',
            'target'   => 'app/Transformers/',
            'needDir'  => false,
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
        'Request' => 'requestType',
        'Lang'    => 'configLang',
    ],
];