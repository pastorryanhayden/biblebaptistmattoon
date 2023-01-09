<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\EventFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'photo',
        'body',
        'start_date',
        'end_date',
        'on_homepage',
        'for',
    ];

    protected $casts = [
        'on_homepage' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    protected static function newFactory()
    {
        return EventFactory::new();
    }
}
