<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Game
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Game newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game query()
 * @mixin \Eloquent
 * @property-read \App\Models\Favourite $favourite
 * @property-read \App\Models\Preference $preference
 * @property-read \App\Models\User $user
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $year
 * @property string $company
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereYear($value)
 */
class Game extends Model
{

    public $fillable = ['name', 'year', 'company', 'image'];

    public function path()
    {
        return route('game.show', $this);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function preference()
    {
        return $this->belongsTo(Preference::class);
    }
    public function favourite()
    {
        return $this->belongsTo(Favourite::class);
    }
    use HasFactory;
}
