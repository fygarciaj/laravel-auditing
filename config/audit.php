<?php
    
    return [
        
        'enabled' => env('AUDITING_ENABLED', true),
        
        /*
        |--------------------------------------------------------------------------
        | Audit Implementation
        |--------------------------------------------------------------------------
        |
        | Define which Audit model implementation should be used.
        |
        */
        
        'implementation' => Fygarciaj\Auditing\Models\Audit::class,
        
        /*
        |--------------------------------------------------------------------------
        | User Morph prefix & Guards
        |--------------------------------------------------------------------------
        |
        | Define the morph prefix and authentication guards for the User resolver.
        |
        */
        
        'user'     => [
            'morph_prefix' => 'user',
            'guards'       => [
                'web',
                'api',
            ],
        ],
        
        /*
        |--------------------------------------------------------------------------
        | Audit Resolvers
        |--------------------------------------------------------------------------
        |
        | Define the User, IP Address, User Agent and URL resolver implementations.
        |
        */
        'resolver' => [
            'user'       => Fygarciaj\Auditing\Resolvers\UserResolver::class,
            'ip_address' => Fygarciaj\Auditing\Resolvers\IpAddressResolver::class,
            'user_agent' => Fygarciaj\Auditing\Resolvers\UserAgentResolver::class,
            'url'        => Fygarciaj\Auditing\Resolvers\UrlResolver::class,
            'connection' => Fygarciaj\Auditing\Resolvers\ConnectionResolver::class,
        
        ],
        
        /*
        |--------------------------------------------------------------------------
        | Audit Events
        |--------------------------------------------------------------------------
        |
        | The Eloquent events that trigger an Audit.
        |
        */
        
        'events' => [
            'created',
            'updated',
            'deleted',
            'restored',
        ],
        
        /*
        |--------------------------------------------------------------------------
        | Strict Mode
        |--------------------------------------------------------------------------
        |
        | Enable the strict mode when auditing?
        |
        */
        
        'strict' => false,
        
        /*
        |--------------------------------------------------------------------------
        | Audit Timestamps
        |--------------------------------------------------------------------------
        |
        | Should the created_at, updated_at and deleted_at timestamps be audited?
        |
        */
        
        'timestamps' => false,
        
        /*
        |--------------------------------------------------------------------------
        | Audit Threshold
        |--------------------------------------------------------------------------
        |
        | Specify a threshold for the amount of Audit records a model can have.
        | Zero means no limit.
        |
        */
        
        'threshold' => 0,
        
        /*
        |--------------------------------------------------------------------------
        | Audit Driver
        |--------------------------------------------------------------------------
        |
        | The default audit driver used to keep track of changes.
        |
        */
        
        'driver' => 'database',
        
        /*
        |--------------------------------------------------------------------------
        | Audit Driver Configurations
        |--------------------------------------------------------------------------
        |
        | Available audit drivers and respective configurations.
        |
        */
        
        'drivers' => [
            'database' => [
                'table'      => '@GCMAUDITS',
                'connection' => null,
            ],
        ],
        
        /*
        |--------------------------------------------------------------------------
        | Audit Console
        |--------------------------------------------------------------------------
        |
        | Whether console events should be audited (eg. php artisan db:seed).
        |
        */
        
        'console' => true,
    ];
