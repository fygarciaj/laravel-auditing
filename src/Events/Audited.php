<?php

namespace Fygarciaj\Auditing\Events;

use Fygarciaj\Auditing\Contracts\Audit;
use Fygarciaj\Auditing\Contracts\Auditable;
use Fygarciaj\Auditing\Contracts\AuditDriver;

class Audited
{
    /**
     * The Auditable model.
     *
     * @var \Fygarciaj\Auditing\Contracts\Auditable
     */
    public $model;

    /**
     * Audit driver.
     *
     * @var \Fygarciaj\Auditing\Contracts\AuditDriver
     */
    public $driver;

    /**
     * The Audit model.
     *
     * @var \Fygarciaj\Auditing\Contracts\Audit|null
     */
    public $audit;

    /**
     * Create a new Audited event instance.
     *
     * @param \Fygarciaj\Auditing\Contracts\Auditable   $model
     * @param \Fygarciaj\Auditing\Contracts\AuditDriver $driver
     * @param \Fygarciaj\Auditing\Contracts\Audit       $audit
     */
    public function __construct(Auditable $model, AuditDriver $driver, Audit $audit = null)
    {
        $this->model = $model;
        $this->driver = $driver;
        $this->audit = $audit;
    }
}
