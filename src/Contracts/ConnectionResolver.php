<?php

namespace Fygarciaj\Auditing\Contracts;

interface ConnectionResolver
{
    /**
     * Resolve the URL.
     *
     * @return string
     */
    public static function resolve(): string;
}
