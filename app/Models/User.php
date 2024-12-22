<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use App\Models\School;

class User extends Authenticatable implements FilamentUser, HasTenants
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_super'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_super' => 'boolean'
        ];
    }

    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class);
    }

    /**
     * Filament canAccessPanel
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
    
    /**
     * Filament getTenants (multi-tenancy)
     */
    public function getTenants(Panel $panel): Collection
    {
        return $this->schools;
    }
    
    /**
     * Filament canAccessTenant (multi-tenancy)
     */
    public function canAccessTenant(Model $tenant): bool
    {
        return $this->schools()->whereKey($tenant)->exists();
    }
}
