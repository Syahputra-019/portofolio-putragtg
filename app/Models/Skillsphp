<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'proficiency',
        'icon',
        'sort_order',
    ];

    public function projects(): BelongsToMany
    {
        return $this->belongToMany(Project::class);
    }
}
