<?php

namespace Fygarciaj\Auditing\Redactors;

class LeftRedactor implements \Fygarciaj\Auditing\Contracts\AttributeRedactor
{
    /**
     * {@inheritdoc}
     */
    public static function redact($value): string
    {
        $total = strlen($value);
        $tenth = ceil($total / 10);

        // Make sure single character strings get redacted
        $length = ($total > $tenth) ? ($total - $tenth) : 1;

        return str_pad(substr($value, $length), $total, '#', STR_PAD_LEFT);
    }
}
