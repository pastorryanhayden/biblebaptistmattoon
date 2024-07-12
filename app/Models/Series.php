<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'photo',
        'featured',
        'body',
    ];

    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
        ];
    }

    public function sermons(): HasMany
    {
        return $this->hasMany(Sermon::class);
    }
}
