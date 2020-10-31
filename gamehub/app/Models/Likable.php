<?php


namespace App\Models;


use http\Env\Request;
use Illuminate\Database\Eloquent\Builder;

trait Likable
{

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select game_id, sum(preference) likes, sum(!preference) dislikes from preferences group by game_id',
            'likes',
            'likes.game_id',
            'game_id'
        );
    }

    public function isDisLikedBy(User $user)
    {
        return (bool)$user->likes
            ->where('game_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            [
                'liked' => $liked,
            ]

        );
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return (bool)$user->likes
            ->where('game_id', $this->id)
            ->where('liked', true)
            ->count();
    }
}
