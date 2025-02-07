<?php

namespace Fygarciaj\Auditing\Contracts;

interface IpAddressResolver
{
    /**
     * Resolve the IP Address.
     *
     * @return string
     */
    public static function resolve(): string;
}
