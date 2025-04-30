<?php

namespace App\Models;

use App\Enum\Rating;
use App\Enum\State;
use App\Enum\Status;
use App\Enum\Type;
use App\Observers\DealershipObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy(DealershipObserver::class)]
class Dealership extends Model
{
    protected $casts = [
        'in_development' => 'boolean',
        'state' => State::class,
        'status' => Status::class,
        'rating' => Rating::class,
        'type' => Type::class,
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::created(function ($dealership) {
            $dealership->user_id = auth()->user()->id;
        });

    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function progresses(): HasMany
    {
        return $this->hasMany(Progress::class);
    }

    public function dealerEmails(): HasMany
    {
        return $this->hasMany(DealerEmail::class);
    }

    public function sentEMails(): HasMany
    {
        return $this->hasMany(SentEmail::class);
    }

    public function getTotalStoreCountAttribute(): int
    {
        return $this->stores()->count() + 1;
    }
}
