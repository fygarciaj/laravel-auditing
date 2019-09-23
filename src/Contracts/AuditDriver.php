<?php

namespace Fygarciaj\Auditing\Contracts;

interface AuditDriver
{
    /**
     * Perform an audit.
     *
     * @param \Fygarciaj\Auditing\Contracts\Auditable $model
     *
     * @return \Fygarciaj\Auditing\Contracts\Audit
     */
    public function audit(Auditable $model): Audit;

    /**
     * Remove older audits that go over the threshold.
     *
     * @param \Fygarciaj\Auditing\Contracts\Auditable $model
     *
     * @return bool
     */
    public function prune(Auditable $model): bool;
}
