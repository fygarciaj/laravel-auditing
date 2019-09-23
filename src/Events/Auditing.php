<?php

namespace Fygarciaj\Auditing\Events;

use Fygarciaj\Auditing\Contracts\Auditable;
use Fygarciaj\Auditing\Contracts\AuditDriver;

class Auditing
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
     * Create a new Auditing event instance.
     *
     * @param \Fygarciaj\Auditing\Contracts\Auditable   $model
     * @param \Fygarciaj\Auditing\Contracts\AuditDriver $driver
     */
    public function __construct(Auditable $model, AuditDriver $driver)
    {
        $this->model = $model;
        $this->driver = $driver;
    }
}
