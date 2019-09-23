<?php

namespace Fygarciaj\Auditing\Resolvers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class UserResolver implements \Fygarciaj\Auditing\Contracts\UserResolver
{
    /**
     * {@inheritdoc}
     */
    public static function resolve()
    {
        $guards = Config::get('audit.user.guards', [
            'web',
            'api',
        ]);

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::shouldUse($guard);
                return Auth::guard($guard)->user();
            }
        }
    }
}
