<?php

namespace Fygarciaj\Auditing\Resolvers;

use Illuminate\Support\Facades\Request;

class UserAgentResolver implements \Fygarciaj\Auditing\Contracts\UserAgentResolver
{
    /**
     * {@inheritdoc}
     */
    public static function resolve()
    {
        return Request::header('User-Agent');
    }
}
