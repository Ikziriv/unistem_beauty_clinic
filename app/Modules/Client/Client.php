<?php

namespace App\Modules\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id', 'registered_at', 'api_token'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'registered_at'
    ];

    /**
     * Get the user's fullname titleized.
     */
    public function getFullnameAttribute(): string
    {
        return title_case($this->name);
    }

    /**
     * Scope a query to only include users registered last week.
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('registered_at', [carbon('1 week ago'), now()])
                     ->latest();
    }

    /**
     * Scope a query to order users by latest registered.
     */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('registered_at', 'desc');
    }

    /**
     * Return the user's comments
     */
    public function comments(): HasMany
    {
        return $this->hasMany('App\Modules\Comment\Comment', 'client_id');
    }
    
    /**
     * Return the user's likes
     */
    public function likes(): HasMany
    {
        return $this->hasMany('App\Modules\Like\Like', 'client_id');
    }
}
