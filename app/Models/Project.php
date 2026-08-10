<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'demo_url',
        'github_url',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }
}
