<?php

namespace OwenIt\Auditing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Database\Factories\AuditFactory;

/**
 * @property string $tags
 * @property string $event
 * @property array $new_values
 * @property array $old_values
 * @property mixed $user
 * @property mixed $auditable
 * @property mixed $user_id
 * @property mixed $auditable_id
 * @property string $url
 * @property string $ip_address
 * @property string $user_agent
 * @property null|Carbon\Carbon $created_at
 * @property null|Carbon\Carbon $updated_at
 */
class Audit extends Model implements \OwenIt\Auditing\Contracts\Audit
{
    use \OwenIt\Auditing\Audit;
    use HasFactory;

    /**
     * {@inheritdoc}
     */
    protected $guarded = [];

    /**
     * Is globally auditing disabled?
     *
     * @var bool
     */
    public static $auditingGloballyDisabled = false;

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'old_values'   => 'json',
        'new_values'   => 'json',
        // Note: Please do not add 'auditable_id' in here, as it will break non-integer PK models
    ];

    public function getSerializedDate($date)
    {
        return $this->serializeDate($date);
    }

    public static function newFactory(): AuditFactory
    {
        return new AuditFactory();
    }
}
