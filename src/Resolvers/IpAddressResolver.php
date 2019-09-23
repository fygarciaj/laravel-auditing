<?php

namespace Fygarciaj\Auditing\Resolvers;

use Illuminate\Support\Facades\Request;

class IpAddressResolver implements \Fygarciaj\Auditing\Contracts\IpAddressResolver
{
    /**
     * {@inheritdoc}
     */
    public static function resolve(): string
    {
        return Request::ip();
    }
}
