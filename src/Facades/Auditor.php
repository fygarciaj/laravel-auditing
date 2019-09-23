<?php

namespace Fygarciaj\Auditing\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Fygarciaj\Auditing\Contracts\AuditDriver auditDriver(\Fygarciaj\Auditing\Contracts\Auditable $model);
 * @method static void execute(\Fygarciaj\Auditing\Contracts\Auditable $model);
 */
class Auditor extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return \Fygarciaj\Auditing\Contracts\Auditor::class;
    }
}
