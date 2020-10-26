<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User
 *
 * @property-read \App\Models\Role $role
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role_id
 * @property string $image
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Game[] $game
 * @property-read int|null $game_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Game[] $preferences
 * @property-read int|null $preferences_count
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Favourite[] $favourite
 * @property-read int|null $favourite_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Preference[] $preference
 * @property-read int|null $preference_count
 */
class User extends Model
{
    public $fillable = ['username','password','image','description'];

    public static function where(string $string, $gameid)
    {
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function game()
    {
        return $this->hasMany(Game::class);
    }
    public function preference()
    {
        return $this->hasMany(Preference::class);
    }
    public function favourite()
    {
        return $this->hasMany(Favourite::class);
    }
    use HasFactory;
}
