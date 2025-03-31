<?php

namespace App\Models;

use App\Enum\DevStatus;
use App\Enum\Rating;
use App\Enum\Status;
use App\Enum\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dealership extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'city',
        'state',
        'zip_code',
        'phone',
        'email',
        'current_solution_name',
        'current_solution_use',
        'notes',
        'status',
        'rating',
        'type',
        'in_development',
        'dev_status',
    ];

    protected $casts = [
        'in_development' => 'boolean',
        'dev_status' => DevStatus::class,
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
