<?php

namespace Fygarciaj\Auditing\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model implements \Fygarciaj\Auditing\Contracts\Audit
{
    use \Fygarciaj\Auditing\Audit;

    /**
     * {@inheritdoc}
     */
    protected $guarded = [];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'old_values'   => 'json',
        'new_values'   => 'json',
        // Note: Please do not add 'auditable_id' in here, as it will break non-integer PK models
    ];
}
