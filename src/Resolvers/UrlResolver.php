<?php

namespace Fygarciaj\Auditing\Resolvers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

class UrlResolver implements \Fygarciaj\Auditing\Contracts\UrlResolver
{
    /**
     * {@inheritdoc}
     */
    public static function resolve(): string
    {
        if (App::runningInConsole()) {
            return 'console';
        }

        return Request::fullUrl();
    }
}
