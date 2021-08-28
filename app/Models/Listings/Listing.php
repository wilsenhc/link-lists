<?php

namespace App\Models\Listings;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Listings\Listing
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $image_url
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read User|null $user
 * @method static \Database\Factories\Listings\ListingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Listing newQuery()
 * @method static \Illuminate\Database\Query\Builder|Listing onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Listing query()
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Listing withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Listing withoutTrashed()
 * @mixin \Eloquent
 */
class Listing extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $table = 'listings';

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'user_id',
    ];

    protected static $logAttributes = ['*'];

    protected static $logOnlyDirty = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
