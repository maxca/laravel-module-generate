<?php return [
    /*
    |--------------------------------------------------------------------------
    | Setting open route
    |--------------------------------------------------------------------------
    */
    'backend' => [
        'limit' => '30',
        'image' => 'jpg|jpeg|png',
        'link'  => 'admin',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Setting open route
    |--------------------------------------------------------------------------
    */
    'route'   => [
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
        'autoload'   => true,
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
        'BackendRepository'  => [
            'resource' => 'template/BackendRepository.stub',
            'target'   => 'app/Repositories/',
            'needDir'  => true,
            'name'     => 'BackendRepository',
        ],
        'Repository'         => [
            'resource' => 'template/Interface.stub',
            'target'   => 'app/Interfaces/',
            'needDir'  => false,
            'name'     => 'Repository',
        ],
        'RouteApi'           => [
            'resource' => 'template/RouteApi.stub',
            'target'   => 'Routes/api/',
            'needDir'  => true,
            'name'     => 'Route',
        ],
        'RouteWeb'           => [
            'resource' => 'template/RouteWeb.stub',
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
        /*
        |--------------------------------------------------------------------------
        | set view
        |--------------------------------------------------------------------------
        */

        'IndexView'  => [
            'resource' => 'template/index.blade.stub',
            'target'   => 'resources/views/',
            'needDir'  => true,
            'name'     => 'index.blade',
            'isView'   => true,
        ],
        'EditView'   => [
            'resource' => 'template/edit.blade.stub',
            'target'   => 'resources/views/',
            'needDir'  => true,
            'name'     => 'edit.blade',
            'isView'   => true,
        ],
        'DetailView' => [
            'resource' => 'template/detail.blade.stub',
            'target'   => 'resources/views/',
            'needDir'  => true,
            'name'     => 'detail.blade',
            'isView'   => true,
        ],
        'ShowView'   => [
            'resource' => 'template/show.blade.stub',
            'target'   => 'resources/views/',
            'needDir'  => true,
            'name'     => 'show.blade',
            'isView'   => true,
        ],
        'CreateView' => [
            'resource' => 'template/create.blade.stub',
            'target'   => 'resources/views/',
            'needDir'  => true,
            'name'     => 'create.blade',
            'isView'   => true,
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

    /*
    |--------------------------------------------------------------------------
    | Set list of replace label
    |--------------------------------------------------------------------------
    */

    'label' => [
        'search'  => [
            '_en', '_th', '_id',
        ],
        'replace' => [
            '[en]', '[th]', ''
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Set list of use cnd cloudflare
    |--------------------------------------------------------------------------
    */
    'use_cdn'   => [
        'production',
        'staging',
    ],

];