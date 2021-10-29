<?php

namespace App\Modules\Like;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'likeable_id',
        'likeable_type',
        'client_id',
    ];

    /**
     * Get all of the owning likeable models.
     */
    public function likeable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Return the like's client
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo('App\Modules\Client\Client', 'client_id');
    }
}
