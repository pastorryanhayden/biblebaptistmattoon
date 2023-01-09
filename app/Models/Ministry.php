<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\MinistryFactory;

class Ministry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'for',
        'leader_id',
        'body',
        'meeting_info',
        'homepage',
        'image'
    ];

    protected $casts = [
        'homepage' => 'boolean'
    ];

    protected static function newFactory()
    {
        return MinistryFactory::new();
    }

    public function leader()
    {
        return $this->belongsTo(Leader::class);
    }
}
