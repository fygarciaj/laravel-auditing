<?php

namespace Fygarciaj\Auditing\Resolvers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;

class ConnectionResolver implements \Fygarciaj\Auditing\Contracts\ConnectionResolver
{
    /**
     * {@inheritdoc}
     */
    public static function resolve(): string
    {

        return Request::hasHeader('Office') ? Request::header('Office') : Config::get('database.default');
    }
}
