<?php

namespace App\Models;

use Auth;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
        'token_verify',
        'token_validate',
        'link_indication',
        'indicator',
        'is_admin',
        'avatar',
        'modules',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'modules' => 'array',
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function favorite(): HasMany
    {
        return $this->hasMany(TopicFavorite::class);
    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(TopicComments::class);
    }

    public function follows(): HasMany
    {
        return $this->hasMany(FollowUsers::class);
    }

    public function followers(): HasMany
    {
        return $this->hasMany(FollowUsers::class, 'follow_user_id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Documents::class, 'user_id');
    }
}
