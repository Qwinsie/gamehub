<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Preference
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Preference newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Preference newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Preference query()
 * @mixin \Eloquent
 * @property-read \App\Models\Game $game
 * @property-read \App\Models\User $user
 * @property int $id
 * @property int $user_id
 * @property int $game_id
 * @property int $preference
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Preference whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Preference whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Preference whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Preference wherePreference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Preference whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Preference whereUserId($value)
 */
class Preference extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
