<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\User;
use Awcodes\Curator\Models\Media as CuratorMedia;

class School extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function owner(): BelongsToMany
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get the articles for the school.
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    /**
     * Get the articleCategories for the school.
     */
    public function articleCategories(): HasMany
    {
        return $this->hasMany(ArticleCategory::class);
    }


    public function media(): HasMany {
        return $this->hasMany(CuratorMedia::class);
    }
}
