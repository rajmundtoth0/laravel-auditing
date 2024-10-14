<?php

namespace OwenIt\Auditing\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Tests\Database\Factories\ApiModelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $api_model_id
 * @property string $content
 * @property null|\Carbon\Carbon $published_at
 * @property null|\Carbon\Carbon $created_at
 * @property null|\Carbon\Carbon $updated_at
 * @property null|\Carbon\Carbon $deleted_at
 */
class ApiModel extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    use HasFactory;

    /**
     * @var string UUID key
     */
    public $primaryKey = 'api_model_id';

    /**
     * @var bool Set to false for UUID keys
     */
    public $incrementing = false;

    /**
     * @var string Set to string for UUID keys
     */
    protected $keyType = 'string';

    /**
     * {@inheritdoc}
     */
    protected $dates = [
        'published_at',
    ];

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'api_model_id',
        'content',
        'published_at',
    ];

    public static function newFactory(): ApiModelFactory
    {
        return new ApiModelFactory();
    }
}
